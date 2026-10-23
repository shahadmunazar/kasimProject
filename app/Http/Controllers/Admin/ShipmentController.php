<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shipment;
use App\Models\ShipmentEvent;
use App\Models\DeliveryAttempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShipmentController extends Controller
{
    public function index(Request $request)
    {
        $query = Shipment::with(['order', 'warehouse', 'deliveryPersonnel.user'])->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('delivery_type')) {
            $query->where('delivery_type', $request->delivery_type);
        }

        if ($request->filled('search')) {
            $term = $request->search;
            $query->where(function ($q) use ($term) {
                $q->where('shipment_number', 'like', "%{$term}%")
                  ->orWhere('awb_number', 'like', "%{$term}%")
                  ->orWhere('tracking_number', 'like', "%{$term}%")
                  ->orWhereHas('order', function ($oq) use ($term) {
                      $oq->where('order_number', 'like', "%{$term}%")
                         ->orWhere('customer_name', 'like', "%{$term}%")
                         ->orWhere('mobile', 'like', "%{$term}%");
                  });
            });
        }

        $shipments = $query->paginate(15)->withQueryString();
        return view('admin.shipments.index', compact('shipments'));
    }

    public function show(Shipment $shipment)
    {
        $shipment->load(['order.items.product', 'warehouse', 'deliveryPersonnel.user', 'items.product', 'events', 'attempts.attemptedBy']);
        return view('admin.shipments.show', compact('shipment'));
    }

    public function updateStatus(Request $request, Shipment $shipment)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,ready_to_ship,packed,ready_for_pickup,shipped,in_transit,out_for_delivery,delivered,delivery_failed,return_initiated,returned_to_sender',
            'location' => 'nullable|string|max:150',
            'description' => 'required|string|max:500',
        ]);

        return DB::transaction(function () use ($request, $shipment) {
            $newStatus = $request->status;

            $updates = ['status' => $newStatus];
            if ($newStatus === 'shipped' && !$shipment->shipped_at) {
                $updates['shipped_at'] = now();
            }
            if ($newStatus === 'delivered' && !$shipment->delivered_at) {
                $updates['delivered_at'] = now();
            }

            $shipment->update($updates);

            if ($shipment->order) {
                $orderUpdates = ['delivery_status' => $newStatus];
                if ($newStatus === 'delivered') {
                    $orderUpdates['status'] = 'delivered';
                    $orderUpdates['payment_status'] = 'paid';
                } elseif (in_array($newStatus, ['shipped', 'in_transit', 'out_for_delivery'])) {
                    if ($shipment->order->status !== 'delivered') {
                        $orderUpdates['status'] = 'dispatched';
                    }
                }
                $shipment->order->update($orderUpdates);
            }

            ShipmentEvent::create([
                'shipment_id' => $shipment->id,
                'status' => $newStatus,
                'location' => $request->location ?: 'Fulfillment Hub',
                'description' => $request->description,
                'source' => 'admin',
                'event_timestamp' => now(),
            ]);

            return redirect()->back()->with('success', "Shipment status updated to '{$newStatus}' successfully!");
        });
    }

    public function logAttempt(Request $request, Shipment $shipment)
    {
        $request->validate([
            'status' => 'required|in:delivered,failed,rescheduled',
            'failure_reason' => 'nullable|required_if:status,failed|string|max:150',
            'rescheduled_date' => 'nullable|required_if:status,rescheduled|date',
            'recipient_name' => 'nullable|required_if:status,delivered|string|max:150',
            'proof_photo' => 'nullable|image|max:3072',
            'notes' => 'nullable|string',
        ]);

        return DB::transaction(function () use ($request, $shipment) {
            $photoPath = null;
            if ($request->hasFile('proof_photo')) {
                $photoPath = $request->file('proof_photo')->store('delivery_proofs', 'public');
            }

            $attemptCount = $shipment->attempts()->count() + 1;

            DeliveryAttempt::create([
                'shipment_id' => $shipment->id,
                'attempted_by' => Auth::id(),
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

                $shipment->order->update([
                    'status' => 'delivered',
                    'delivery_status' => 'delivered',
                    'payment_status' => 'paid',
                    'is_confirmed' => true,
                ]);

                ShipmentEvent::create([
                    'shipment_id' => $shipment->id,
                    'status' => 'delivered',
                    'location' => $shipment->order->city,
                    'description' => "Delivered to {$request->recipient_name} on attempt #{$attemptCount}.",
                    'source' => 'admin',
                    'event_timestamp' => now(),
                ]);
            } else {
                $statusToSet = $request->status === 'failed' ? 'delivery_failed' : 'in_transit';
                $shipment->update(['status' => $statusToSet]);

                ShipmentEvent::create([
                    'shipment_id' => $shipment->id,
                    'status' => $statusToSet,
                    'location' => $shipment->order->city,
                    'description' => "Delivery attempt #{$attemptCount} {$request->status}. " . ($request->failure_reason ?: $request->notes),
                    'source' => 'admin',
                    'event_timestamp' => now(),
                ]);
            }

            return redirect()->back()->with('success', 'Delivery attempt logged successfully.');
        });
    }
}
