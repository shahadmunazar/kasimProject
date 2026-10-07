<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\UserAddress;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index($product_id)
    {
        $product = Product::findOrFail($product_id);
        $user = Auth::user();
        $addresses = UserAddress::where('user_id', $user->id)->get();
        $qrCodeSetting = \App\Models\Setting::where('key', 'payment_qr_code')->first();
        $qrCodePath = $qrCodeSetting ? $qrCodeSetting->value : null;
        
        return view('frontend.checkout.index', compact('product', 'user', 'addresses', 'qrCodePath'));
    }

    public function process(Request $request, $product_id)
    {
        $product = Product::findOrFail($product_id);
        $user = Auth::user();
        
        $request->validate([
            'payment_method' => 'required|in:cod,QR',
        ]);
        
        // Handle address selection or creation
        if ($request->has('address_id') && $request->address_id != 'new') {
            $address = UserAddress::where('user_id', $user->id)->where('id', $request->address_id)->firstOrFail();
            $addressId = $address->id;
        } else {
            $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
                'alternative_number' => 'nullable|string|max:20',
                'address_line_1' => 'required|string|max:255',
                'city' => 'required|string|max:100',
                'state' => 'required|string|max:100',
                'zip' => 'required|string|max:20',
            ]);
            
            $isDefault = UserAddress::where('user_id', $user->id)->count() === 0;
            
            $address = UserAddress::create([
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
            $addressId = $address->id;
        }

        $paymentData = [
            'transaction_id' => null,
            'utr_number' => null,
            'payment_amount' => null,
            'payment_date' => null,
            'payment_screenshot' => null,
        ];

        if ($request->payment_method === 'QR') {
            $request->validate([
                'transaction_id' => 'required|string|max:255',
                'payment_date' => 'required|date',
                'payment_screenshot' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $paymentData['transaction_id'] = $request->transaction_id;
            $paymentData['utr_number'] = $request->utr_number;
            $paymentData['payment_amount'] = $product->price;
            $paymentData['payment_date'] = $request->payment_date;

            if ($request->hasFile('payment_screenshot')) {
                $paymentData['payment_screenshot'] = $request->file('payment_screenshot')->store('payments', 'public');
            }
        }

        // Create Order
        $order = Order::create([
            'order_number' => 'ORD-' . strtoupper(uniqid()),
            'user_id' => $user->id,
            'user_address_id' => $address->id,
            'customer_name' => $address->name,
            'mobile' => $address->phone,
            'email' => $user->email,
            'address' => $address->address_line_1 . ' ' . $address->address_line_2,
            'city' => $address->city,
            'state' => $address->state,
            'pincode' => $address->zip,
            'product_id' => $product->id,
            'quantity' => 1,
            'amount' => $product->price,
            'payment_method' => $request->payment_method,
            'status' => 'pending',
            'is_confirmed' => false,
            'transaction_id' => $paymentData['transaction_id'],
            'utr_number' => $paymentData['utr_number'],
            'payment_amount' => $paymentData['payment_amount'],
            'payment_date' => $paymentData['payment_date'],
            'payment_screenshot' => $paymentData['payment_screenshot'],
        ]);

        // Create Order Item
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => 1,
            'price' => $product->price,
        ]);

        // Send Emails
        try {
            if ($user->email) {
                \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\OrderPlacedCustomer($order));
            }
            // Send to Admin (assuming a config or fixed email, or all users with 'admin' role)
            $adminEmail = env('MAIL_FROM_ADDRESS', 'admin@example.com');
            \Illuminate\Support\Facades\Mail::to($adminEmail)->send(new \App\Mail\OrderPlacedAdmin($order));
        } catch (\Exception $e) {
            // Log error or ignore to not break checkout
            \Illuminate\Support\Facades\Log::error('Failed to send order emails: ' . $e->getMessage());
        }

        return redirect()->route('frontend.dashboard.orders')->with('success', 'Order placed successfully! Order Number: ' . $order->order_number);
    }
}
