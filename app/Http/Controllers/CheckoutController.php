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
        $deliveryCharge = 0; // Calculated dynamically via AJAX based on address
        return view('checkout.index', compact('product', 'qrCode', 'deliveryCharge'));
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

        $destination = $request->address . ', ' . $request->city . ', ' . $request->state . ' ' . $request->pincode;
        
        $routesService = new \App\Services\Delivery\GoogleRoutesService();
        $pricingService = new \App\Services\Delivery\DeliveryPricingService();
        
        $distanceKm = $routesService->getDistanceInKm($destination);
        $pricingResult = $pricingService->calculate($distanceKm, $amount);
        
        if (!$pricingResult['success']) {
            return redirect()->back()->withErrors(['delivery' => $pricingResult['error']])->withInput();
        }

        $deliveryCharge = $pricingResult['charge'];
        $amount += $deliveryCharge;

        $order = new Order($request->except(['payment_screenshot', 'confirmation']));
        $order->product_id = $product->id;
        $order->amount = $amount;
        $order->delivery_distance_km = $pricingResult['distance_km'];
        $order->delivery_charge = $pricingResult['charge'];
        $order->base_delivery_charge = $pricingResult['base_charge'];
        $order->per_km_rate = $pricingResult['per_km_rate'];
        $order->free_delivery_reason = $pricingResult['free_reason'];
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

    public function calculateDelivery(Request $request)
    {
        $request->validate([
            'address_id' => 'nullable|exists:user_addresses,id',
            'address' => 'required_without:address_id|string|nullable',
            'city' => 'required_without:address_id|string|nullable',
            'state' => 'required_without:address_id|string|nullable',
            'pincode' => 'required_without:address_id|string|nullable',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);
        $activePrice = ($product->offer_price && $product->offer_price > 0) ? $product->offer_price : $product->price;
        $orderSubtotal = $activePrice * $request->quantity;

        if ($request->filled('address_id') && $request->address_id !== 'new') {
            $address = \App\Models\UserAddress::findOrFail($request->address_id);
            $destination = $address->address_line_1 . ', ' . $address->city . ', ' . $address->state . ' ' . $address->zip;
        } else {
            $destination = $request->address . ', ' . $request->city . ', ' . $request->state . ' ' . $request->pincode;
        }

        $routesService = new \App\Services\Delivery\GoogleRoutesService();
        $pricingService = new \App\Services\Delivery\DeliveryPricingService();
        
        $distanceKm = $routesService->getDistanceInKm($destination);
        $pricingResult = $pricingService->calculate($distanceKm, $orderSubtotal);

        return response()->json($pricingResult);
    }
}
