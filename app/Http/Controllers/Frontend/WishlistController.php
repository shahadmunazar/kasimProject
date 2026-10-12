<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\WishlistService;
use App\Models\Product;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * View full wishlist page.
     */
    public function index()
    {
        $wishlistItems = WishlistService::getItems();
        $totalCount = WishlistService::getCount();

        return view('frontend.wishlist.index', compact('wishlistItems', 'totalCount'));
    }

    /**
     * Toggle item in wishlist via AJAX.
     */
    public function toggle(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $result = WishlistService::toggle($request->product_id);

        $wasAlreadyInWishlist = ($result['status'] === 'removed');
        $message = $wasAlreadyInWishlist
            ? $result['product_name'] . ' is already in your wishlist (removed)!'
            : $result['product_name'] . ' added to your wishlist!';

        return response()->json([
            'success' => true,
            'status' => $result['status'], // 'added' or 'removed'
            'already_in_wishlist' => $wasAlreadyInWishlist,
            'message' => $message,
            'count' => $result['count'],
        ]);
    }

    /**
     * Get real-time wishlist count badge.
     */
    public function count()
    {
        return response()->json([
            'count' => WishlistService::getCount(),
        ]);
    }
}
