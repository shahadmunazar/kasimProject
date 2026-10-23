<?php

namespace App\Services;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartService
{
    /**
     * Get unique session identifier for guest users.
     */
    public static function getSessionId(): string
    {
        if (!Session::has('cart_session_id')) {
            Session::put('cart_session_id', Session::getId() ?: uniqid('cart_', true));
        }
        return Session::get('cart_session_id');
    }

    /**
     * Retrieve query builder for current user or guest session.
     */
    public static function query()
    {
        if (Auth::check()) {
            return CartItem::where('user_id', Auth::id());
        }
        return CartItem::where('session_id', self::getSessionId());
    }

    /**
     * Get all items in current cart with product eager loading.
     */
    public static function getItems()
    {
        return self::query()->with(['product.category', 'product.productModel'])->latest()->get();
    }

    /**
     * Get total quantity of items in cart.
     */
    public static function getCount(): int
    {
        return (int) self::query()->sum('quantity');
    }

    /**
     * Calculate cart subtotal.
     */
    public static function getSubtotal(): float
    {
        $items = self::getItems();
        $subtotal = 0;
        foreach ($items as $item) {
            $unitPrice = $item->price ?? $item->product->offer_price ?? $item->product->price ?? 0;
            $subtotal += ($unitPrice * $item->quantity);
        }
        return (float) $subtotal;
    }

    /**
     * Check if product already exists in current cart.
     */
    public static function has(int $productId): bool
    {
        return self::query()->where('product_id', $productId)->exists();
    }

    /**
     * Add product to cart or increment quantity with available stock validation.
     * Returns array ['success' => bool, 'item' => CartItem|null, 'already_in_cart' => bool, 'message' => string, 'available_stock' => int]
     */
    public static function add(int $productId, int $quantity = 1): array
    {
        $product = Product::findOrFail($productId);
        $availableStock = $product->availableStock();

        // Check if product is completely out of stock
        if ($product->track_inventory && $availableStock <= 0) {
            return [
                'success' => false,
                'error' => 'out_of_stock',
                'message' => "Sorry, '{$product->name}' is currently out of stock.",
                'available_stock' => 0,
            ];
        }

        $itemQuery = Auth::check()
            ? CartItem::where('user_id', Auth::id())->where('product_id', $productId)
            : CartItem::where('session_id', self::getSessionId())->where('product_id', $productId);

        $item = $itemQuery->first();
        $currentCartQty = $item ? (int)$item->quantity : 0;
        $newTotalQty = $currentCartQty + $quantity;

        // Check if total requested quantity exceeds available stock
        if ($product->track_inventory && $newTotalQty > $availableStock) {
            $allowedToAdd = max(0, $availableStock - $currentCartQty);
            return [
                'success' => false,
                'error' => 'stock_limit_exceeded',
                'message' => $currentCartQty > 0
                    ? "Only {$availableStock} items are available in stock. You already have {$currentCartQty} in your cart."
                    : "Sorry, only {$availableStock} items are available in stock.",
                'available_stock' => $availableStock,
                'current_in_cart' => $currentCartQty,
                'max_allowed' => $allowedToAdd,
            ];
        }

        $unitPrice = $product->offer_price ?: $product->price ?: 0;
        $alreadyInCart = false;

        if ($item) {
            $alreadyInCart = true;
            $item->quantity = $newTotalQty;
            $item->price = $unitPrice;
            $item->save();
        } else {
            $item = CartItem::create([
                'user_id' => Auth::id(),
                'session_id' => Auth::check() ? null : self::getSessionId(),
                'product_id' => $productId,
                'quantity' => $quantity,
                'price' => $unitPrice,
            ]);
        }

        return [
            'success' => true,
            'item' => $item,
            'already_in_cart' => $alreadyInCart,
            'product_name' => $product->name,
            'available_stock' => $availableStock,
        ];
    }

    /**
     * Update quantity of an item in cart with stock restriction check.
     */
    public static function updateQuantity(int $itemId, int $quantity): array
    {
        $item = self::query()->with('product')->where('id', $itemId)->first();
        if (!$item) {
            return [
                'success' => false,
                'message' => 'Cart item not found.',
            ];
        }

        if ($quantity <= 0) {
            $item->delete();
            return [
                'success' => true,
                'message' => 'Item removed from cart.',
                'item_deleted' => true,
            ];
        }

        $product = $item->product;
        if ($product && $product->track_inventory) {
            $availableStock = $product->availableStock();
            if ($quantity > $availableStock) {
                return [
                    'success' => false,
                    'error' => 'stock_limit_exceeded',
                    'message' => "Cannot set quantity to {$quantity}. Only {$availableStock} items available in stock.",
                    'available_stock' => $availableStock,
                    'current_quantity' => $item->quantity,
                ];
            }
        }

        $item->quantity = $quantity;
        $item->save();

        return [
            'success' => true,
            'message' => 'Cart quantity updated.',
            'item' => $item,
            'available_stock' => $product ? $product->availableStock() : null,
        ];
    }

    /**
     * Remove item from cart.
     */
    public static function remove(int $itemId): bool
    {
        return (bool) self::query()->where('id', $itemId)->delete();
    }

    /**
     * Clear all items in current cart.
     */
    public static function clear(): void
    {
        self::query()->delete();
    }

    /**
     * Merge guest session cart into authenticated user cart.
     */
    public static function mergeGuestCartIntoUser(int $userId): void
    {
        $sessionId = Session::get('cart_session_id');
        if (!$sessionId) {
            return;
        }

        $guestItems = CartItem::where('session_id', $sessionId)->get();
        foreach ($guestItems as $guestItem) {
            $userItem = CartItem::where('user_id', $userId)->where('product_id', $guestItem->product_id)->first();
            if ($userItem) {
                $userItem->quantity += $guestItem->quantity;
                $userItem->save();
                $guestItem->delete();
            } else {
                $guestItem->user_id = $userId;
                $guestItem->session_id = null;
                $guestItem->save();
            }
        }
    }
}
