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
            'free_delivery_min_order', 'delivery_max_distance', 'warehouse_address'
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
            'free_delivery_min_order', 'delivery_max_distance', 'warehouse_address'
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
}
