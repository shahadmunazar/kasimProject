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
     * Add product to cart or increment quantity.
     * Returns array ['item' => CartItem, 'already_in_cart' => bool]
     */
    public static function add(int $productId, int $quantity = 1): array
    {
        $product = Product::findOrFail($productId);
        $unitPrice = $product->offer_price ?: $product->price ?: 0;

        $itemQuery = Auth::check()
            ? CartItem::where('user_id', Auth::id())->where('product_id', $productId)
            : CartItem::where('session_id', self::getSessionId())->where('product_id', $productId);

        $item = $itemQuery->first();
        $alreadyInCart = false;

        if ($item) {
            $alreadyInCart = true;
            $item->quantity += $quantity;
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
            'item' => $item,
            'already_in_cart' => $alreadyInCart,
            'product_name' => $product->name,
        ];
    }

    /**
     * Update quantity of an item in cart.
     */
    public static function updateQuantity(int $itemId, int $quantity): bool
    {
        $item = self::query()->where('id', $itemId)->first();
        if (!$item) {
            return false;
        }

        if ($quantity <= 0) {
            $item->delete();
            return true;
        }

        $item->quantity = $quantity;
        $item->save();
        return true;
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
