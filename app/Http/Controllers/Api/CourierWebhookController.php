<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shipment;
use App\Models\ShipmentEvent;
use Illuminate\Support\Facades\Log;

class CourierWebhookController extends Controller
{
    /**
     * Handle incoming courier tracking webhook
     */
    public function handle(Request $request, string $provider)
    {
        Log::info("Courier webhook received from {$provider}:", $request->all());

        $payload = $request->all();
        $awb = $payload['awb'] ?? ($payload['tracking_number'] ?? ($payload['awb_number'] ?? null));

        if (!$awb) {
            return response()->json(['error' => 'Missing AWB or tracking number'], 400);
        }

        $shipment = Shipment::where('awb_number', $awb)
            ->orWhere('tracking_number', $awb)
            ->first();

        if (!$shipment) {
            Log::warning("Webhook received for unknown AWB: {$awb}");
            return response()->json(['message' => 'Shipment not found, acknowledged'], 200);
        }

        $rawStatus = strtolower($payload['current_status'] ?? ($payload['status'] ?? 'in_transit'));
        $location = $payload['location'] ?? ($payload['city'] ?? null);
        $notes = $payload['scans_description'] ?? ($payload['activity'] ?? 'Tracking status update');
        $eventTime = isset($payload['timestamp']) ? \Carbon\Carbon::parse($payload['timestamp']) : now();

        // Idempotency check: don't record duplicate event
        $alreadyLogged = ShipmentEvent::where('shipment_id', $shipment->id)
            ->where('status', $rawStatus)
            ->where('event_timestamp', $eventTime)
            ->exists();

        if (!$alreadyLogged) {
            ShipmentEvent::create([
                'shipment_id' => $shipment->id,
                'status' => $rawStatus,
                'location' => $location,
                'description' => $notes,
                'source' => 'courier_webhook',
                'event_timestamp' => $eventTime,
                'metadata' => $payload,
            ]);
        }

        // Map status to system shipment status
        $systemStatus = match ($rawStatus) {
            'delivered' => 'delivered',
            'out for delivery', 'out_for_delivery' => 'out_for_delivery',
            'in transit', 'in_transit' => 'in_transit',
            'shipped', 'dispatched' => 'shipped',
            'rto', 'returned', 'return_to_origin' => 'returned_to_sender',
            'undelivered', 'failed' => 'delivery_failed',
            default => $shipment->status,
        };

        $shipmentUpdates = ['status' => $systemStatus];

        if ($systemStatus === 'delivered' && !$shipment->delivered_at) {
            $shipmentUpdates['delivered_at'] = $eventTime;
            $shipment->order->update(['status' => 'delivered']);
        }

        $shipment->update($shipmentUpdates);

        return response()->json([
            'success' => true,
            'message' => 'Tracking event synchronized successfully',
            'shipment_id' => $shipment->id,
            'current_status' => $systemStatus,
        ]);
    }
}
