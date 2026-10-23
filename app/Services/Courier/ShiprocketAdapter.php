<?php

namespace App\Services\Courier;

use App\Models\Shipment;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class ShiprocketAdapter implements CourierServiceInterface
{
    protected string $apiBase;
    protected ?string $email;
    protected ?string $password;
    protected ?string $pickupPincode;
    protected ?string $pickupLocation;

    public function __construct()
    {
        $this->apiBase = config('services.shiprocket.api_base', env('SHIPROCKET_API_BASE', 'https://apiv2.shiprocket.in/v1/external'));

        $dbEmail = null;
        $dbPassword = null;
        $dbPincode = null;
        $dbLocation = null;

        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('settings')) {
                $dbEmail = \App\Models\Setting::where('key', 'shiprocket_email')->value('value');
                $dbPassword = \App\Models\Setting::where('key', 'shiprocket_password')->value('value');
                $dbPincode = \App\Models\Setting::where('key', 'shiprocket_pickup_pincode')->value('value');
                $dbLocation = \App\Models\Setting::where('key', 'shiprocket_pickup_location')->value('value');
            }
        } catch (\Exception $e) {
            // Ignore if during early initialization
        }

        $this->email = $dbEmail ?: config('services.shiprocket.email', env('SHIPROCKET_EMAIL'));
        $this->password = $dbPassword ?: config('services.shiprocket.password', env('SHIPROCKET_PASSWORD'));
        $this->pickupPincode = $dbPincode ?: config('services.shiprocket.pickup_pincode', env('SHIPROCKET_PICKUP_PINCODE', '110025'));
        $this->pickupLocation = $dbLocation ?: config('services.shiprocket.pickup_location', env('SHIPROCKET_PICKUP_LOCATION', 'Primary'));
    }

    protected function getToken(): ?string
    {
        if (empty($this->email) || empty($this->password)) {
            return null;
        }

        return Cache::remember('shiprocket_auth_token', 86400, function () {
            try {
                $response = Http::post("{$this->apiBase}/auth/login", [
                    'email' => $this->email,
                    'password' => $this->password,
                ]);

                if ($response->successful()) {
                    return $response->json('token');
                }
            } catch (\Exception $e) {
                Log::error('Shiprocket auth error: ' . $e->getMessage());
            }
            return null;
        });
    }

    public function checkServiceability(string $pincode): array
    {
        $token = $this->getToken();
        if (!$token) {
            return [
                'serviceable' => true,
                'courier_name' => 'Shiprocket (Standard)',
                'estimated_days' => 3,
                'message' => 'Credentials pending. Fallback estimation applied.',
            ];
        }

        try {
            $pickupPincode = $this->pickupPincode ?: '110025';
            $response = Http::withToken($token)->get("{$this->apiBase}/courier/serviceability", [
                'pickup_postcode' => $pickupPincode,
                'delivery_postcode' => $pincode,
                'cod' => 0,
                'weight' => '1.0',
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $couriers = $data['data']['available_courier_companies'] ?? [];
                if (!empty($couriers)) {
                    $first = $couriers[0];
                    return [
                        'serviceable' => true,
                        'courier_name' => $first['courier_name'] ?? 'Shiprocket Express',
                        'estimated_days' => (int)($first['estimated_delivery_days'] ?? 3),
                        'rate' => (float)($first['rate'] ?? 0),
                        'message' => 'Pincode is serviceable.',
                    ];
                }
            }
        } catch (\Exception $e) {
            Log::error('Shiprocket serviceability error: ' . $e->getMessage());
        }

        return [
            'serviceable' => false,
            'courier_name' => 'Shiprocket',
            'estimated_days' => 0,
            'message' => 'Pincode not currently serviceable via Shiprocket.',
        ];
    }

    public function createShipment(Shipment $shipment): array
    {
        $token = $this->getToken();
        $order = $shipment->order;

        if (!$token) {
            // Graceful test/mock fallback without failing order fulfillment
            $mockAwb = 'SR' . strtoupper(uniqid());
            return [
                'success' => true,
                'tracking_number' => $mockAwb,
                'awb_number' => $mockAwb,
                'courier_name' => 'Shiprocket Express (Simulated)',
                'tracking_url' => "https://shiprocket.co/tracking/{$mockAwb}",
                'label_url' => null,
                'message' => 'Shiprocket credentials not provided in .env. Running in simulated courier mode.',
            ];
        }

        try {
            $items = [];
            foreach ($shipment->items as $sItem) {
                $items[] = [
                    'name' => $sItem->product->name ?? 'Product',
                    'sku' => $sItem->product->sku ?? ('SKU-' . $sItem->product_id),
                    'units' => $sItem->quantity,
                    'selling_price' => (float)($sItem->product->offer_price ?: $sItem->product->price ?: 100),
                ];
            }

            $payload = [
                'order_id' => $shipment->shipment_number,
                'order_date' => now()->format('Y-m-d H:i'),
                'pickup_location' => $this->pickupLocation ?: 'Primary',
                'billing_customer_name' => $order->customer_name,
                'billing_last_name' => '',
                'billing_address' => $order->address,
                'billing_city' => $order->city,
                'billing_pincode' => $order->pincode,
                'billing_state' => $order->state,
                'billing_country' => 'India',
                'billing_email' => $order->email ?? 'customer@tcsmarttechnology.com',
                'billing_phone' => $order->mobile,
                'shipping_is_billing' => true,
                'order_items' => $items,
                'payment_method' => $order->payment_method === 'cod' ? 'COD' : 'Prepaid',
                'sub_total' => (float)$order->amount,
                'length' => 10,
                'breadth' => 10,
                'height' => 10,
                'weight' => 1.0,
            ];

            $response = Http::withToken($token)->post("{$this->apiBase}/orders/create/adhoc", $payload);

            if ($response->successful()) {
                $data = $response->json();
                $awb = $data['awb_code'] ?? ($data['shipment_id'] ?? null);

                return [
                    'success' => true,
                    'tracking_number' => (string)$awb,
                    'awb_number' => (string)$awb,
                    'courier_name' => $data['courier_name'] ?? 'Shiprocket',
                    'tracking_url' => "https://shiprocket.co/tracking/{$awb}",
                    'label_url' => $data['label_url'] ?? null,
                    'message' => 'Shipment booked successfully with Shiprocket.',
                ];
            } else {
                Log::error('Shiprocket order creation failed: ' . $response->body());
            }
        } catch (\Exception $e) {
            Log::error('Shiprocket API Exception: ' . $e->getMessage());
        }

        // Return manual fallback on API error
        return (new ManualCourierService())->createShipment($shipment);
    }

    public function generateLabel(Shipment $shipment): ?string
    {
        return $shipment->label_url;
    }

    public function trackShipment(string $trackingNumber): array
    {
        $token = $this->getToken();
        if (!$token) {
            return (new ManualCourierService())->trackShipment($trackingNumber);
        }

        try {
            $response = Http::withToken($token)->get("{$this->apiBase}/courier/track/awb/{$trackingNumber}");
            if ($response->successful()) {
                $data = $response->json();
                $trackData = $data['tracking_data'] ?? [];
                return [
                    'status' => strtolower($trackData['shipment_status'] ?? 'in_transit'),
                    'carrier' => 'Shiprocket',
                    'events' => $trackData['shipment_track_activities'] ?? [],
                ];
            }
        } catch (\Exception $e) {
            Log::error('Shiprocket tracking error: ' . $e->getMessage());
        }

        return (new ManualCourierService())->trackShipment($trackingNumber);
    }

    public function cancelShipment(Shipment $shipment): bool
    {
        $token = $this->getToken();
        if ($token && $shipment->awb_number) {
            try {
                Http::withToken($token)->post("{$this->apiBase}/orders/cancel/shipment/awbs", [
                    'awbs' => [$shipment->awb_number],
                ]);
            } catch (\Exception $e) {
                Log::error('Shiprocket cancel error: ' . $e->getMessage());
            }
        }
        $shipment->update(['status' => 'cancelled']);
        return true;
    }
}
