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
        return view('admin.settings.index', compact('qrCode'));
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
}
