<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Models\Shipment;
use App\Models\ShipmentEvent;
use App\Models\DeliveryAttempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DeliveryDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $personnel = $user->deliveryPersonnel;

        if (!$personnel) {
            abort(403, 'No delivery personnel profile attached to this account.');
        }

        $activeDeliveries = Shipment::where('delivery_personnel_id', $personnel->id)
            ->whereIn('status', ['packed', 'shipped', 'in_transit', 'out_for_delivery'])
            ->with(['order.items.product'])
            ->latest()
            ->get();

        $completedDeliveries = Shipment::where('delivery_personnel_id', $personnel->id)
            ->where('status', 'delivered')
            ->with(['order'])
            ->latest()
            ->take(10)
            ->get();

        return view('delivery.dashboard', compact('user', 'personnel', 'activeDeliveries', 'completedDeliveries'));
    }

    public function show($id)
    {
        $user = Auth::user();
        $personnel = $user->deliveryPersonnel;

        $shipment = Shipment::where('delivery_personnel_id', $personnel->id)
            ->where('id', $id)
            ->with(['order.items.product', 'events', 'attempts'])
            ->firstOrFail();

        return view('delivery.show', compact('user', 'personnel', 'shipment'));
    }

    public function updateProgress(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:in_transit,out_for_delivery',
        ]);

        $user = Auth::user();
        $personnel = $user->deliveryPersonnel;
        $shipment = Shipment::where('delivery_personnel_id', $personnel->id)->where('id', $id)->firstOrFail();

        $shipment->update(['status' => $request->status]);

        ShipmentEvent::create([
            'shipment_id' => $shipment->id,
            'status' => $request->status,
            'location' => $shipment->order->city,
            'description' => "Status updated by delivery agent {$user->name}: " . ucfirst(str_replace('_', ' ', $request->status)),
            'source' => 'delivery_app',
            'event_timestamp' => now(),
        ]);

        return redirect()->back()->with('success', 'Delivery status updated.');
    }

    public function submitAttempt(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:delivered,failed,rescheduled',
            'failure_reason' => 'nullable|required_if:status,failed|string|max:150',
            'rescheduled_date' => 'nullable|required_if:status,rescheduled|date',
            'recipient_name' => 'nullable|required_if:status,delivered|string|max:150',
            'proof_photo' => 'nullable|image|max:4096',
            'notes' => 'nullable|string|max:500',
        ]);

        $user = Auth::user();
        $personnel = $user->deliveryPersonnel;
        $shipment = Shipment::where('delivery_personnel_id', $personnel->id)->where('id', $id)->firstOrFail();

        return DB::transaction(function () use ($request, $user, $shipment) {
            $photoPath = null;
            if ($request->hasFile('proof_photo')) {
                $photoPath = $request->file('proof_photo')->store('delivery_proofs', 'public');
            }

            $attemptCount = $shipment->attempts()->count() + 1;

            DeliveryAttempt::create([
                'shipment_id' => $shipment->id,
                'attempted_by' => $user->id,
                'attempt_number' => $attemptCount,
                'status' => $request->status,
                'failure_reason' => $request->failure_reason,
                'rescheduled_date' => $request->rescheduled_date,
                'recipient_name' => $request->recipient_name,
                'proof_photo' => $photoPath,
                'notes' => $request->notes,
                'attempted_at' => now(),
            ]);

            if ($request->status === 'delivered') {
                $shipment->update([
                    'status' => 'delivered',
                    'delivered_at' => now(),
                    'recipient_name' => $request->recipient_name,
                    'proof_photo' => $photoPath ?: $shipment->proof_photo,
                ]);

                $shipment->order->update(['status' => 'delivered']);

                ShipmentEvent::create([
                    'shipment_id' => $shipment->id,
                    'status' => 'delivered',
                    'location' => $shipment->order->city,
                    'description' => "Successfully delivered to {$request->recipient_name} by {$user->name}.",
                    'source' => 'delivery_app',
                    'event_timestamp' => now(),
                ]);

                return redirect()->route('delivery.dashboard')->with('success', "Order #{$shipment->order->order_number} marked as Delivered!");
            } else {
                $statusToSet = $request->status === 'failed' ? 'delivery_failed' : 'in_transit';
                $shipment->update(['status' => $statusToSet]);

                ShipmentEvent::create([
                    'shipment_id' => $shipment->id,
                    'status' => $statusToSet,
                    'location' => $shipment->order->city,
                    'description' => "Delivery attempt by {$user->name}: {$request->status} - " . ($request->failure_reason ?: $request->notes),
                    'source' => 'delivery_app',
                    'event_timestamp' => now(),
                ]);

                return redirect()->back()->with('warning', 'Delivery attempt recorded.');
            }
        });
    }
}
