<?php

namespace App\Services\Delivery;

use App\Models\Setting;

class DeliveryPricingService
{
    /**
     * Calculate delivery charge based on distance and settings.
     * @param float|null $distanceKm
     * @param float $orderSubtotal
     * @return array
     */
    public function calculate($distanceKm, $orderSubtotal)
    {
        $enabled = Setting::where('key', 'delivery_charge_enabled')->value('value') === '1';
        $roadDistanceEnabled = Setting::where('key', 'delivery_distance_enabled')->value('value') === '1';
        $freeDeliveryEnabled = Setting::where('key', 'free_delivery_enabled')->value('value') === '1';
        
        $baseFee = (float) (Setting::where('key', 'delivery_base_fee')->value('value') ?? 30);
        $perKmFee = (float) (Setting::where('key', 'delivery_per_km_fee')->value('value') ?? 8);
        $minFee = (float) (Setting::where('key', 'delivery_min_fee')->value('value') ?? 30);
        $maxFee = (float) (Setting::where('key', 'delivery_max_fee')->value('value') ?? 300);
        $freeMinOrder = (float) (Setting::where('key', 'free_delivery_min_order')->value('value') ?? 1000);
        $maxDistance = (float) (Setting::where('key', 'delivery_max_distance')->value('value') ?? 100);

        if (!$enabled) {
            return $this->result(0, 0, $baseFee, $perKmFee, 'Delivery charges are disabled.');
        }

        if ($freeDeliveryEnabled && $orderSubtotal >= $freeMinOrder) {
            return $this->result(0, $distanceKm, $baseFee, $perKmFee, 'Eligible for free delivery.');
        }

        if ($distanceKm === null) {
            // Distance could not be calculated
            if ($roadDistanceEnabled) {
                return $this->error('Could not calculate distance. Please check your address.');
            }
            // Fallback to base fee if road distance pricing is not mandatory
            return $this->result($baseFee, null, $baseFee, $perKmFee, 'Flat base fee applied (distance unknown).');
        }

        if ($distanceKm > $maxDistance) {
            return $this->error("Delivery address is outside our maximum serviceable area of {$maxDistance} km.");
        }

        $calculatedFee = $baseFee;
        if ($roadDistanceEnabled) {
            $calculatedFee += ($distanceKm * $perKmFee);
        }

        // Apply min/max limits
        if ($calculatedFee < $minFee) {
            $calculatedFee = $minFee;
        }
        if ($calculatedFee > $maxFee) {
            $calculatedFee = $maxFee;
        }

        return $this->result(round($calculatedFee, 2), $distanceKm, $baseFee, $perKmFee, null);
    }

    private function result($charge, $distance, $base, $perKm, $freeReason = null)
    {
        return [
            'success' => true,
            'charge' => $charge,
            'distance_km' => $distance,
            'base_charge' => $base,
            'per_km_rate' => $perKm,
            'free_reason' => $freeReason
        ];
    }

    private function error($message)
    {
        return [
            'success' => false,
            'error' => $message,
            'charge' => 0
        ];
    }
}
