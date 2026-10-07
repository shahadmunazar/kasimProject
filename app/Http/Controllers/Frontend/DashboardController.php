<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('frontend.user.dashboard', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'phone' => 'nullable|string|max:20',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->hasFile('avatar')) {
            $user->avatar = $request->file('avatar')->store('avatars', 'public');
        }

        $user->save();

        return back()->with('success', 'Profile updated successfully!');
    }

    public function orders()
    {
        $user = Auth::user();
        $orders = \App\Models\Order::where('user_id', $user->id)->latest()->get();
        return view('frontend.user.orders', compact('user', 'orders'));
    }

    public function showOrder($id)
    {
        $user = Auth::user();
        $order = \App\Models\Order::where('user_id', $user->id)->where('id', $id)->firstOrFail();
        $orderItems = \App\Models\OrderItem::where('order_id', $order->id)->get();
        return view('frontend.user.order_details', compact('user', 'order', 'orderItems'));
    }

    public function addresses()
    {
        $user = Auth::user();
        $addresses = \App\Models\UserAddress::where('user_id', $user->id)->get();
        return view('frontend.user.addresses', compact('user', 'addresses'));
    }

    public function storeAddress(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'alternative_number' => 'nullable|string|max:20',
            'address_line_1' => 'required|string|max:255',
            'address_line_2' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'zip' => 'required|string|max:20',
        ]);

        $user = Auth::user();

        // If it's the first address or set as default
        $isDefault = $request->has('is_default') || \App\Models\UserAddress::where('user_id', $user->id)->count() === 0;

        if ($isDefault) {
            \App\Models\UserAddress::where('user_id', $user->id)->update(['is_default' => false]);
        }

        $address = \App\Models\UserAddress::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'phone' => $request->phone,
            'alternative_number' => $request->alternative_number,
            'address_line_1' => $request->address_line_1,
            'address_line_2' => $request->address_line_2,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'is_default' => $isDefault,
        ]);

        if ($request->ajax()) {
            return response()->json(['success' => true, 'address' => $address, 'message' => 'Address added successfully.']);
        }
        return back()->with('success', 'Address added successfully.');
    }

    public function updateAddress(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'alternative_number' => 'nullable|string|max:20',
            'address_line_1' => 'required|string|max:255',
            'address_line_2' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'zip' => 'required|string|max:20',
        ]);

        $user = Auth::user();
        $address = \App\Models\UserAddress::where('user_id', $user->id)->where('id', $id)->firstOrFail();

        $isDefault = $request->has('is_default');

        if ($isDefault && !$address->is_default) {
            \App\Models\UserAddress::where('user_id', $user->id)->update(['is_default' => false]);
        }

        $address->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'alternative_number' => $request->alternative_number,
            'address_line_1' => $request->address_line_1,
            'address_line_2' => $request->address_line_2,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'is_default' => $isDefault ? true : $address->is_default,
        ]);

        if ($request->ajax()) {
            return response()->json(['success' => true, 'address' => $address, 'message' => 'Address updated successfully.']);
        }
        return back()->with('success', 'Address updated successfully.');
    }

    public function deleteAddress(Request $request, $id)
    {
        $address = \App\Models\UserAddress::where('user_id', Auth::id())->where('id', $id)->firstOrFail();
        $address->delete();
        
        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Address deleted successfully.']);
        }
        return back()->with('success', 'Address deleted successfully.');
    }
}
