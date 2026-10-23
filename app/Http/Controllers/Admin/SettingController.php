<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $qrCode = Setting::where('key', 'payment_qr_code')->first();
        
        $settings = Setting::whereIn('key', [
            'delivery_charge_enabled', 'delivery_distance_enabled', 'free_delivery_enabled',
            'delivery_base_fee', 'delivery_per_km_fee', 'delivery_min_fee', 'delivery_max_fee',
            'free_delivery_min_order', 'delivery_max_distance', 'warehouse_address', 'google_maps_api_key',
            'shiprocket_enabled', 'shiprocket_email', 'shiprocket_password', 'shiprocket_pickup_pincode', 'shiprocket_pickup_location',
            'invoice_company_name', 'invoice_brand_name', 'invoice_gstin', 'invoice_pan',
            'invoice_address', 'invoice_city', 'invoice_state', 'invoice_state_code', 'invoice_pincode',
            'invoice_phone', 'invoice_email', 'invoice_website', 'invoice_prefix', 'invoice_default_hsn',
            'invoice_tax_rate', 'invoice_bank_name', 'invoice_bank_account', 'invoice_bank_ifsc',
            'invoice_bank_branch', 'invoice_upi_id', 'invoice_authorized_signatory', 'invoice_terms'
        ])->pluck('value', 'key');
        
        return view('admin.settings.index', compact('qrCode', 'settings'));
    }

    public function updateQrCode(Request $request)
    {
        $request->validate([
            'qr_code' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $setting = Setting::firstOrCreate(['key' => 'payment_qr_code']);
        
        if ($request->hasFile('qr_code')) {
            if ($setting->value && Storage::disk('public')->exists($setting->value)) {
                Storage::disk('public')->delete($setting->value);
            }
            $path = $request->file('qr_code')->store('settings', 'public');
            $setting->update(['value' => $path]);
        }

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'QR Code updated successfully!',
                'qr_code_url' => asset('storage/' . $path)
            ]);
        }

        return redirect()->back()->with('success', 'QR Code updated successfully!');
    }

    public function updateDeliveryCharge(Request $request)
    {
        $settings = [
            'delivery_charge_enabled', 'delivery_distance_enabled', 'free_delivery_enabled',
            'delivery_base_fee', 'delivery_per_km_fee', 'delivery_min_fee', 'delivery_max_fee',
            'free_delivery_min_order', 'delivery_max_distance', 'warehouse_address', 'google_maps_api_key'
        ];

        foreach ($settings as $key) {
            if ($request->has($key)) {
                $value = $request->input($key);
                Setting::updateOrCreate(['key' => $key], ['value' => is_array($value) ? implode(',', $value) : $value]);
            } else {
                // For checkboxes
                if (in_array($key, ['delivery_charge_enabled', 'delivery_distance_enabled', 'free_delivery_enabled'])) {
                    Setting::updateOrCreate(['key' => $key], ['value' => '0']);
                }
            }
        }

        return redirect()->back()->with('success', 'Delivery settings updated successfully!');
    }

    public function updateShiprocket(Request $request)
    {
        $request->validate([
            'shiprocket_email' => 'nullable|email',
            'shiprocket_password' => 'nullable|string',
            'shiprocket_pickup_pincode' => 'nullable|string|max:10',
            'shiprocket_pickup_location' => 'nullable|string|max:100',
        ]);

        $keys = [
            'shiprocket_enabled',
            'shiprocket_email',
            'shiprocket_password',
            'shiprocket_pickup_pincode',
            'shiprocket_pickup_location'
        ];

        foreach ($keys as $key) {
            if ($key === 'shiprocket_enabled') {
                Setting::updateOrCreate(['key' => $key], ['value' => $request->has('shiprocket_enabled') ? '1' : '0']);
            } elseif ($request->filled($key)) {
                Setting::updateOrCreate(['key' => $key], ['value' => trim($request->input($key))]);
            }
        }

        // Clear cached auth token so changes take effect immediately
        \Illuminate\Support\Facades\Cache::forget('shiprocket_auth_token');

        return redirect()->back()->with('success', 'Shiprocket courier settings saved successfully!');
    }

    public function updateInvoiceSettings(Request $request)
    {
        $request->validate([
            'invoice_company_name' => 'required|string|max:255',
            'invoice_brand_name' => 'nullable|string|max:255',
            'invoice_gstin' => 'nullable|string|max:20',
            'invoice_pan' => 'nullable|string|max:20',
            'invoice_address' => 'required|string|max:500',
            'invoice_city' => 'required|string|max:100',
            'invoice_state' => 'required|string|max:100',
            'invoice_state_code' => 'nullable|string|max:10',
            'invoice_pincode' => 'required|string|max:15',
            'invoice_phone' => 'nullable|string|max:30',
            'invoice_email' => 'nullable|email|max:100',
            'invoice_website' => 'nullable|string|max:100',
            'invoice_prefix' => 'nullable|string|max:20',
            'invoice_default_hsn' => 'nullable|string|max:20',
            'invoice_tax_rate' => 'nullable|numeric|min:0|max:100',
            'invoice_bank_name' => 'nullable|string|max:150',
            'invoice_bank_account' => 'nullable|string|max:50',
            'invoice_bank_ifsc' => 'nullable|string|max:30',
            'invoice_bank_branch' => 'nullable|string|max:150',
            'invoice_upi_id' => 'nullable|string|max:100',
            'invoice_authorized_signatory' => 'nullable|string|max:255',
            'invoice_terms' => 'nullable|string',
        ]);

        $keys = [
            'invoice_company_name', 'invoice_brand_name', 'invoice_gstin', 'invoice_pan',
            'invoice_address', 'invoice_city', 'invoice_state', 'invoice_state_code', 'invoice_pincode',
            'invoice_phone', 'invoice_email', 'invoice_website', 'invoice_prefix', 'invoice_default_hsn',
            'invoice_tax_rate', 'invoice_bank_name', 'invoice_bank_account', 'invoice_bank_ifsc',
            'invoice_bank_branch', 'invoice_upi_id', 'invoice_authorized_signatory', 'invoice_terms'
        ];

        foreach ($keys as $key) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => trim((string)$request->input($key, ''))]
            );
        }

        return redirect()->back()->with('success', 'Tax Invoice & Seller settings updated successfully!');
    }
}

