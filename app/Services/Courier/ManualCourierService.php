<?php

namespace App\Services\Courier;

use App\Models\Shipment;
use Illuminate\Support\Str;

class ManualCourierService implements CourierServiceInterface
{
    public function checkServiceability(string $pincode): array
    {
        return [
            'serviceable' => true,
            'courier_name' => 'TC Smart In-House Fleet',
            'estimated_days' => 2,
            'message' => 'Serviceable via direct company fleet.',
        ];
    }

    public function createShipment(Shipment $shipment): array
    {
        $trackingNumber = 'TCSM-' . strtoupper(Str::random(10));
        return [
            'success' => true,
            'tracking_number' => $trackingNumber,
            'awb_number' => $trackingNumber,
            'courier_name' => 'TC Smart Direct Delivery',
            'tracking_url' => route('tracking.public', ['token' => $shipment->order->tracking_token]),
            'label_url' => null,
            'message' => 'Manual in-house shipment created successfully.',
        ];
    }

    public function generateLabel(Shipment $shipment): ?string
    {
        return null;
    }

    public function trackShipment(string $trackingNumber): array
    {
        $shipment = Shipment::where('tracking_number', $trackingNumber)
            ->orWhere('awb_number', $trackingNumber)
            ->with('events')
            ->first();

        if (!$shipment) {
            return [
                'status' => 'not_found',
                'events' => [],
            ];
        }

        return [
            'status' => $shipment->status,
            'carrier' => 'TC Smart Direct Delivery',
            'delivered_at' => $shipment->delivered_at,
            'events' => $shipment->events->map(fn($e) => [
                'status' => $e->status,
                'location' => $e->location,
                'description' => $e->description,
                'timestamp' => $e->event_timestamp->toIso8601String(),
            ])->toArray(),
        ];
    }

    public function cancelShipment(Shipment $shipment): bool
    {
        $shipment->update(['status' => 'cancelled']);
        return true;
    }
}
