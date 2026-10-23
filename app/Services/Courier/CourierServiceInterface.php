<?php

namespace App\Services\Courier;

use App\Models\Shipment;

interface CourierServiceInterface
{
    /**
     * Check if delivery is serviceable to target pincode
     */
    public function checkServiceability(string $pincode): array;

    /**
     * Create a shipment with the courier partner and return tracking details
     */
    public function createShipment(Shipment $shipment): array;

    /**
     * Generate or download shipping label URL
     */
    public function generateLabel(Shipment $shipment): ?string;

    /**
     * Track an existing shipment by AWB or tracking number
     */
    public function trackShipment(string $trackingNumber): array;

    /**
     * Cancel shipment with the courier
     */
    public function cancelShipment(Shipment $shipment): bool;
}
