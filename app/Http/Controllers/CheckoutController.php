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
        $userAddresses = Auth::check() ? Auth::user()->addresses()->latest()->get() : collect();
        $defaultAddress = $userAddresses->firstWhere('is_default', true) ?? $userAddresses->first();

        return view('checkout.index', compact(
            'directProduct', 'items', 'subtotal', 'totalQuantity', 
            'isDirectBuy', 'qrCode', 'deliveryCharge', 'userAddresses', 'defaultAddress'
        ));
    }

    public function store(Request $request, $product = null)
    {
        // If customer selected a saved address, merge address fields if missing
        if (Auth::check() && $request->filled('address_id') && $request->address_id !== 'new') {
            $savedAddr = Auth::user()->addresses()->find($request->address_id);
            if ($savedAddr) {
                if (!$request->filled('customer_name')) {
                    $request->merge(['customer_name' => $savedAddr->name ?: (Auth::user()->name ?? '')]);
                }
                if (!$request->filled('mobile')) {
                    $request->merge(['mobile' => $savedAddr->phone ?: (Auth::user()->phone ?? '')]);
                }
                if (!$request->filled('address')) {
                    $fullAddr = trim($savedAddr->address_line_1 . ($savedAddr->address_line_2 ? ', ' . $savedAddr->address_line_2 : ''));
                    $request->merge(['address' => $fullAddr]);
                }
                if (!$request->filled('city')) {
                    $request->merge(['city' => $savedAddr->city]);
                }
                if (!$request->filled('state')) {
                    $request->merge(['state' => $savedAddr->state]);
                }
                if (!$request->filled('pincode')) {
                    $request->merge(['pincode' => $savedAddr->zip]);
                }
            }
        }

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

        // Validate stock availability before processing order
        foreach ($items as $item) {
            $prod = Product::find($item->product_id);
            if ($prod && $prod->track_inventory && $prod->availableStock() < $item->quantity) {
                return redirect()->back()->withErrors([
                    'stock' => "Sorry, '{$prod->name}' does not have enough stock available (Available: {$prod->availableStock()}, Requested: {$item->quantity})."
                ])->withInput();
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
        $order->tracking_token = \Illuminate\Support\Str::random(32);
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
        $order->payment_status = 'pending';
        $order->delivery_type = 'manual';
        $order->delivery_distance_km = $pricingResult['distance_km'];
        $order->delivery_charge = $pricingResult['charge'];
        $order->base_delivery_charge = $pricingResult['base_charge'];
        $order->per_km_rate = $pricingResult['per_km_rate'];
        $order->free_delivery_reason = $pricingResult['free_reason'];
        $order->transaction_id = $request->transaction_id;
        $order->utr_number = $request->utr_number;
        $order->payment_amount = $request->payment_amount;
        $order->status = 'pending';
        $order->is_confirmed = false;
        $order->terms_accepted_at = ($request->filled('agree_terms') || $request->filled('confirmation')) ? now() : null;
        $order->terms_accepted_ip = $request->ip();

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

        // Commit stock deduction and record movement log
        try {
            $inventoryService = new \App\Services\InventoryService();
            $inventoryService->commitOrderSale($order);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Stock deduction error: ' . $e->getMessage());
        }

        // If this order was checked out from the cart, clear the cart on confirmed successful placement
        if (!$directProduct) {
            CartService::clear();
        }

        // Optionally save new address to customer account for future orders
        if (Auth::check() && $request->boolean('save_new_address') && ($request->input('address_id') === 'new' || !$request->filled('address_id'))) {
            try {
                $isFirst = Auth::user()->addresses()->count() === 0;
                \App\Models\UserAddress::create([
                    'user_id' => Auth::id(),
                    'name' => $request->customer_name,
                    'phone' => $request->mobile,
                    'address_line_1' => $request->address,
                    'city' => $request->city,
                    'state' => $request->state,
                    'zip' => $request->pincode,
                    'is_default' => $isFirst,
                ]);
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::warning('Could not save new address for user: ' . $e->getMessage());
            }
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
            'address_id' => 'nullable',
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
            $address = \App\Models\UserAddress::find($request->address_id);
            if ($address) {
                $destination = $address->address_line_1 . ', ' . $address->city . ', ' . $address->state . ' ' . $address->zip;
            } else {
                $destination = $request->address . ', ' . $request->city . ', ' . $request->state . ' ' . $request->pincode;
            }
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
