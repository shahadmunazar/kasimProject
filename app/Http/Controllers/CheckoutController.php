<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Setting;

class CheckoutController extends Controller
{
    public function index(Product $product)
    {
        $qrCode = Setting::where('key', 'payment_qr_code')->first();
        return view('checkout.index', compact('product', 'qrCode'));
    }

    public function store(Request $request, Product $product)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'required|string',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'pincode' => 'required|string|max:20',
            'quantity' => 'required|integer|min:1',
            'transaction_id' => 'required|string|max:255',
            'utr_number' => 'required|string|max:255',
            'payment_amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'payment_screenshot' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'confirmation' => 'accepted'
        ]);

        $activePrice = ($product->offer_price && $product->offer_price > 0) ? $product->offer_price : $product->price;
        $amount = $activePrice * $request->quantity;

        $order = new Order($request->except(['payment_screenshot', 'confirmation']));
        $order->product_id = $product->id;
        $order->amount = $amount;
        $order->payment_method = 'QR';

        if ($request->hasFile('payment_screenshot')) {
            $order->payment_screenshot = $request->file('payment_screenshot')->store('payments', 'public');
        }

        $order->save();

        return redirect()->route('checkout.success', $order)->with('success', 'Order placed successfully! We will verify your payment.');
    }

    public function success(Order $order)
    {
        return view('checkout.success', compact('order'));
    }
}
