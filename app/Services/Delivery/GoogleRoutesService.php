<?php

namespace App\Services\Delivery;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use App\Models\Setting;
use Exception;

class GoogleRoutesService
{
    /**
     * Get driving distance in kilometers.
     * @param string $destination
     * @return float|null
     */
    public function getDistanceInKm($destination)
    {
        $warehouseAddress = Setting::where('key', 'warehouse_address')->value('value') ?? '110025, India';
        
        // Cache key based on destination to save API calls
        $cacheKey = 'route_distance_' . md5($warehouseAddress . '_' . $destination);
        
        return Cache::remember($cacheKey, now()->addDays(30), function () use ($warehouseAddress, $destination) {
            try {
                $apiKey = config('services.google.routes_api_key', env('GOOGLE_MAPS_ROUTES_API_KEY'));
                
                if (empty($apiKey)) {
                    Log::error('Google Maps Routes API key is missing.');
                    return null;
                }

                $response = Http::withHeaders([
                    'Content-Type' => 'application/json',
                    'X-Goog-Api-Key' => $apiKey,
                    'X-Goog-FieldMask' => 'routes.distanceMeters',
                ])->timeout(10)->post('https://routes.googleapis.com/directions/v2:computeRoutes', [
                    'origin' => [
                        'address' => $warehouseAddress
                    ],
                    'destination' => [
                        'address' => $destination
                    ],
                    'travelMode' => 'DRIVE',
                    'routingPreference' => 'TRAFFIC_UNAWARE',
                    'units' => 'METRIC'
                ]);

                if ($response->successful()) {
                    $data = $response->json();
                    
                    if (isset($data['routes'][0]['distanceMeters'])) {
                        $distanceMeters = $data['routes'][0]['distanceMeters'];
                        return round($distanceMeters / 1000, 2);
                    }
                    
                    Log::warning('Google Routes API returned success but no distanceMeters found.', ['response' => $data]);
                    return null;
                }

                Log::error('Google Routes API failed.', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
                return null;
                
            } catch (Exception $e) {
                Log::error('Google Routes API Exception: ' . $e->getMessage());
                return null;
            }
        });
    }
}
