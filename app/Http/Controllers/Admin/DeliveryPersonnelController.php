<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\DeliveryPersonnel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DeliveryPersonnelController extends Controller
{
    public function index()
    {
        $staff = DeliveryPersonnel::with(['user', 'shipments' => function ($q) {
            $q->whereIn('status', ['shipped', 'in_transit', 'out_for_delivery']);
        }])->latest()->paginate(15);

        return view('admin.delivery_personnel.index', compact('staff'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|email|max:150|unique:users,email',
            'phone' => 'required|string|max:20|unique:users,phone',
            'password' => 'required|string|min:6',
            'employee_code' => 'required|string|max:50|unique:delivery_personnel,employee_code',
            'vehicle_type' => 'nullable|string|max:50',
            'vehicle_number' => 'nullable|string|max:50',
            'license_number' => 'nullable|string|max:100',
            'emergency_contact' => 'nullable|string|max:30',
        ]);

        return DB::transaction(function () use ($request) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'role' => 'delivery',
                'is_active' => true,
            ]);

            DeliveryPersonnel::create([
                'user_id' => $user->id,
                'employee_code' => strtoupper($request->employee_code),
                'vehicle_type' => $request->vehicle_type,
                'vehicle_number' => $request->vehicle_number,
                'license_number' => $request->license_number,
                'emergency_contact' => $request->emergency_contact,
                'is_available' => true,
            ]);

            return redirect()->route('admin.delivery_personnel.index')->with('success', 'Delivery personnel account registered successfully!');
        });
    }

    public function toggleAvailability(DeliveryPersonnel $personnel)
    {
        $personnel->update(['is_available' => !$personnel->is_available]);
        return redirect()->back()->with('success', "Availability status updated for {$personnel->user->name}.");
    }

    public function destroy(DeliveryPersonnel $personnel)
    {
        return DB::transaction(function () use ($personnel) {
            $user = $personnel->user;
            $personnel->delete();
            if ($user && $user->role === 'delivery') {
                $user->delete();
            }
            return redirect()->route('admin.delivery_personnel.index')->with('success', 'Delivery personnel account removed.');
        });
    }
}
