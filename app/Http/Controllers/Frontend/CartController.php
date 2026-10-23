<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\CartService;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * View full cart page.
     */
    public function index()
    {
        $cartItems = CartService::getItems();
        $subtotal = CartService::getSubtotal();
        $totalCount = CartService::getCount();

        return view('frontend.cart.index', compact('cartItems', 'subtotal', 'totalCount'));
    }

    /**
     * Render mini-cart offcanvas HTML & summary data via AJAX.
     */
    public function miniCart()
    {
        $cartItems = CartService::getItems();
        $subtotal = CartService::getSubtotal();
        $totalCount = CartService::getCount();

        $html = view('frontend.cart.partials.drawer_content', compact('cartItems', 'subtotal', 'totalCount'))->render();

        return response()->json([
            'html' => $html,
            'count' => $totalCount,
            'subtotal' => number_format($subtotal, 2),
        ]);
    }

    /**
     * Add product to cart via AJAX.
     */
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|integer|min:1',
        ]);

        $quantity = max(1, (int)$request->input('quantity', 1));
        $result = CartService::add($request->product_id, $quantity);

        if (!$result['success']) {
            return response()->json([
                'success' => false,
                'error' => $result['error'] ?? 'stock_error',
                'message' => $result['message'],
                'available_stock' => $result['available_stock'] ?? 0,
            ], 422);
        }

        $totalCount = CartService::getCount();
        $subtotal = CartService::getSubtotal();
        $product = Product::find($request->product_id);
        $productName = $product->name ?? 'Product';

        $alreadyInCart = $result['already_in_cart'];
        $message = $alreadyInCart
            ? $productName . ' quantity updated in your cart!'
            : $productName . ' added to your cart!';

        return response()->json([
            'success' => true,
            'already_in_cart' => $alreadyInCart,
            'message' => $message,
            'count' => $totalCount,
            'subtotal' => number_format($subtotal, 2),
            'available_stock' => $result['available_stock'],
        ]);
    }

    /**
     * Update cart item quantity via AJAX.
     */
    public function update(Request $request)
    {
        $request->validate([
            'item_id' => 'required|integer',
            'quantity' => 'required|integer|min:0',
        ]);

        $result = CartService::updateQuantity($request->item_id, (int)$request->quantity);

        $cartItems = CartService::getItems();
        $subtotal = CartService::getSubtotal();
        $totalCount = CartService::getCount();

        $html = view('frontend.cart.partials.drawer_content', compact('cartItems', 'subtotal', 'totalCount'))->render();

        if (!$result['success']) {
            return response()->json([
                'success' => false,
                'message' => $result['message'],
                'available_stock' => $result['available_stock'] ?? null,
                'html' => $html,
                'count' => $totalCount,
                'subtotal' => number_format($subtotal, 2),
            ], 422);
        }

        return response()->json([
            'success' => true,
            'html' => $html,
            'count' => $totalCount,
            'subtotal' => number_format($subtotal, 2),
            'message' => $result['message'],
        ]);
    }

    /**
     * Remove item from cart via AJAX.
     */
    public function remove(Request $request)
    {
        $request->validate([
            'item_id' => 'required|integer',
        ]);

        $success = CartService::remove($request->item_id);

        $cartItems = CartService::getItems();
        $subtotal = CartService::getSubtotal();
        $totalCount = CartService::getCount();

        $html = view('frontend.cart.partials.drawer_content', compact('cartItems', 'subtotal', 'totalCount'))->render();

        return response()->json([
            'success' => $success,
            'message' => 'Item removed from your cart.',
            'html' => $html,
            'count' => $totalCount,
            'subtotal' => number_format($subtotal, 2),
        ]);
    }

    /**
     * Get real-time cart count badge.
     */
    public function count()
    {
        return response()->json([
            'count' => CartService::getCount(),
            'subtotal' => number_format(CartService::getSubtotal(), 2),
        ]);
    }
}
