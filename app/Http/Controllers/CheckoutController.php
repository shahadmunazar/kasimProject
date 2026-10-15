<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Setting;
use App\Services\CartService;
use App\Services\Delivery\GoogleRoutesService;
use App\Services\Delivery\DeliveryPricingService;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index($product = null)
    {
        $qrCode = Setting::where('key', 'payment_qr_code')->first();
        $deliveryCharge = 0;

        // If product parameter is passed, load direct buy product
        $directProduct = null;
        if ($product) {
            $directProduct = is_numeric($product) ? Product::find($product) : Product::where('slug', $product)->first();
        }

        $items = collect();
        $subtotal = 0;

        if ($directProduct) {
            $activePrice = ($directProduct->offer_price && $directProduct->offer_price > 0) ? (float)$directProduct->offer_price : (float)$directProduct->price;
            $items->push((object)[
                'product' => $directProduct,
                'quantity' => 1,
                'price' => $activePrice,
                'subtotal' => $activePrice
            ]);
            $subtotal = $activePrice;
        } else {
            // Cart checkout
            $cartItems = CartService::getItems();
            if ($cartItems->isEmpty()) {
                return redirect()->route('products.listing')->with('info', 'Your cart is empty. Please add products to proceed with checkout.');
            }

            foreach ($cartItems as $cItem) {
                if ($cItem->product) {
                    $activePrice = (float)($cItem->price ?? $cItem->product->offer_price ?? $cItem->product->price ?? 0);
                    $items->push((object)[
                        'product' => $cItem->product,
                        'quantity' => (int)$cItem->quantity,
                        'price' => $activePrice,
                        'subtotal' => $activePrice * (int)$cItem->quantity
                    ]);
                    $subtotal += ($activePrice * (int)$cItem->quantity);
                }
            }
        }

        $isDirectBuy = ($directProduct !== null);
        $totalQuantity = $items->sum('quantity');

        return view('checkout.index', compact('directProduct', 'items', 'subtotal', 'totalQuantity', 'isDirectBuy', 'qrCode', 'deliveryCharge'));
    }

    public function store(Request $request, $product = null)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'required|string',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'pincode' => 'required|string|max:20',
            'transaction_id' => 'required|string|max:255',
            'utr_number' => 'required|string|max:255',
            'payment_amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'payment_screenshot' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'confirmation' => 'accepted'
        ]);

        $directProduct = null;
        if ($product) {
            $directProduct = is_numeric($product) ? Product::find($product) : Product::where('slug', $product)->first();
        }

        $items = collect();
        $subtotal = 0;

        if ($directProduct) {
            $qty = max(1, (int)$request->input('quantity', 1));
            $activePrice = ($directProduct->offer_price && $directProduct->offer_price > 0) ? (float)$directProduct->offer_price : (float)$directProduct->price;
            $items->push((object)[
                'product_id' => $directProduct->id,
                'quantity' => $qty,
                'price' => $activePrice,
                'subtotal' => $activePrice * $qty
            ]);
            $subtotal = $activePrice * $qty;
        } else {
            $cartItems = CartService::getItems();
            if ($cartItems->isEmpty()) {
                return redirect()->route('products.listing')->with('error', 'Your cart is empty.');
            }

            foreach ($cartItems as $cItem) {
                if ($cItem->product) {
                    $activePrice = (float)($cItem->price ?? $cItem->product->offer_price ?? $cItem->product->price ?? 0);
                    $items->push((object)[
                        'product_id' => $cItem->product->id,
                        'quantity' => (int)$cItem->quantity,
                        'price' => $activePrice,
                        'subtotal' => $activePrice * (int)$cItem->quantity
                    ]);
                    $subtotal += ($activePrice * (int)$cItem->quantity);
                }
            }
        }

        // Calculate delivery
        $destination = $request->address . ', ' . $request->city . ', ' . $request->state . ' ' . $request->pincode;
        $routesService = new GoogleRoutesService();
        $pricingService = new DeliveryPricingService();

        $distanceKm = $routesService->getDistanceInKm($destination);
        $pricingResult = $pricingService->calculate($distanceKm, $subtotal);

        if (!$pricingResult['success']) {
            return redirect()->back()->withErrors(['delivery' => $pricingResult['error']])->withInput();
        }

        $deliveryCharge = (float)$pricingResult['charge'];
        $grandTotal = $subtotal + $deliveryCharge;

        // Create Order
        $order = new Order();
        $order->order_number = 'ORD-' . strtoupper(uniqid());
        $order->user_id = Auth::id() ?: null;
        $order->customer_name = $request->customer_name;
        $order->mobile = $request->mobile;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->city = $request->city;
        $order->state = $request->state;
        $order->pincode = $request->pincode;
        $order->product_id = $directProduct ? $directProduct->id : ($items->first()->product_id ?? null);
        $order->quantity = $items->sum('quantity');
        $order->amount = $grandTotal;
        $order->payment_method = 'QR';
        $order->delivery_distance_km = $pricingResult['distance_km'];
        $order->delivery_charge = $pricingResult['charge'];
        $order->base_delivery_charge = $pricingResult['base_charge'];
        $order->per_km_rate = $pricingResult['per_km_rate'];
        $order->free_delivery_reason = $pricingResult['free_reason'];
        $order->transaction_id = $request->transaction_id;
        $order->utr_number = $request->utr_number;
        $order->payment_amount = $request->payment_amount;
        $order->payment_date = $request->payment_date;
        $order->status = 'pending';
        $order->is_confirmed = false;

        if ($request->hasFile('payment_screenshot')) {
            $order->payment_screenshot = $request->file('payment_screenshot')->store('payments', 'public');
        }

        $order->save();

        // Create Order Items for all products in the purchase
        foreach ($items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
        }

        // If this order was checked out from the cart, clear the cart on confirmed successful placement
        if (!$directProduct) {
            CartService::clear();
        }

        // Send order notification emails safely
        try {
            if ($order->email) {
                \Illuminate\Support\Facades\Mail::to($order->email)->send(new \App\Mail\OrderPlacedCustomer($order));
            }
            $adminEmail = config('services.admin.email', config('mail.admin_address', env('ADMIN_EMAIL', 'tcsmarttechnology@gmail.com')));
            \Illuminate\Support\Facades\Mail::to($adminEmail)->send(new \App\Mail\OrderPlacedAdmin($order));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Order email error: ' . $e->getMessage());
        }

        return redirect()->route('checkout.success', $order)->with('success', 'Order placed successfully! We will verify your payment.');
    }

    public function success(Order $order)
    {
        $order->load(['product', 'items.product']);
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
            'product_id' => 'nullable|exists:products,id',
            'quantity' => 'nullable|integer|min:1',
            'subtotal' => 'nullable|numeric|min:0',
        ]);

        if ($request->filled('subtotal') && $request->subtotal > 0) {
            $orderSubtotal = (float)$request->subtotal;
        } elseif ($request->filled('product_id')) {
            $product = Product::findOrFail($request->product_id);
            $qty = max(1, (int)$request->input('quantity', 1));
            $activePrice = ($product->offer_price && $product->offer_price > 0) ? (float)$product->offer_price : (float)$product->price;
            $orderSubtotal = $activePrice * $qty;
        } else {
            $orderSubtotal = CartService::getSubtotal();
        }

        if ($request->filled('address_id') && $request->address_id !== 'new') {
            $address = \App\Models\UserAddress::findOrFail($request->address_id);
            $destination = $address->address_line_1 . ', ' . $address->city . ', ' . $address->state . ' ' . $address->zip;
        } else {
            $destination = $request->address . ', ' . $request->city . ', ' . $request->state . ' ' . $request->pincode;
        }

        $routesService = new GoogleRoutesService();
        $pricingService = new DeliveryPricingService();

        $distanceKm = $routesService->getDistanceInKm($destination);
        $pricingResult = $pricingService->calculate($distanceKm, $orderSubtotal);

        return response()->json($pricingResult);
    }
}
