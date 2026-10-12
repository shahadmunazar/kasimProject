<?php

namespace App\Services;

use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WishlistService
{
    /**
     * Get unique session identifier for guest users.
     */
    public static function getSessionId(): string
    {
        if (!Session::has('wishlist_session_id')) {
            Session::put('wishlist_session_id', Session::getId() ?: uniqid('wish_', true));
        }
        return Session::get('wishlist_session_id');
    }

    /**
     * Retrieve query builder for current user or guest session.
     */
    public static function query()
    {
        if (Auth::check()) {
            return Wishlist::where('user_id', Auth::id());
        }
        return Wishlist::where('session_id', self::getSessionId());
    }

    /**
     * Get all items in current wishlist with product eager loading.
     */
    public static function getItems()
    {
        return self::query()->with(['product.category', 'product.productModel'])->latest()->get();
    }

    /**
     * Get count of products in wishlist.
     */
    public static function getCount(): int
    {
        return (int) self::query()->count();
    }

    /**
     * Check if product is in wishlist.
     */
    public static function has(int $productId): bool
    {
        return self::query()->where('product_id', $productId)->exists();
    }

    /**
     * Toggle product in wishlist (Add if not present, remove if present).
     * Returns array ['status' => 'added'|'removed', 'count' => int]
     */
    public static function toggle(int $productId): array
    {
        $product = Product::findOrFail($productId);

        $itemQuery = Auth::check()
            ? Wishlist::where('user_id', Auth::id())->where('product_id', $productId)
            : Wishlist::where('session_id', self::getSessionId())->where('product_id', $productId);

        $item = $itemQuery->first();

        if ($item) {
            $item->delete();
            $status = 'removed';
        } else {
            Wishlist::create([
                'user_id' => Auth::id(),
                'session_id' => Auth::check() ? null : self::getSessionId(),
                'product_id' => $productId,
            ]);
            $status = 'added';
        }

        return [
            'status' => $status,
            'count' => self::getCount(),
            'product_name' => $product->name,
        ];
    }

    /**
     * Merge guest wishlist into user account upon authentication.
     */
    public static function mergeGuestWishlistIntoUser(int $userId): void
    {
        $sessionId = Session::get('wishlist_session_id');
        if (!$sessionId) {
            return;
        }

        $guestItems = Wishlist::where('session_id', $sessionId)->get();
        foreach ($guestItems as $guestItem) {
            $exists = Wishlist::where('user_id', $userId)->where('product_id', $guestItem->product_id)->exists();
            if ($exists) {
                $guestItem->delete();
            } else {
                $guestItem->user_id = $userId;
                $guestItem->session_id = null;
                $guestItem->save();
            }
        }
    }
}
