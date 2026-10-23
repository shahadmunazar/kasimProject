<?php

namespace App\Services\Courier;

use InvalidArgumentException;

class CourierManager
{
    /**
     * Resolve courier service driver
     */
    public static function make(?string $driver = null): CourierServiceInterface
    {
        $driver = $driver ?: config('services.courier.default', 'manual');

        return match (strtolower($driver)) {
            'manual' => new ManualCourierService(),
            'shiprocket' => new ShiprocketAdapter(),
            default => new ManualCourierService(),
        };
    }
}
