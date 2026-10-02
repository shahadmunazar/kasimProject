<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    public function index(Request $request)
    {
        $query = ProductReview::with('product')->latest();

        if ($request->has('product_id') && $request->product_id != '') {
            $query->where('product_id', $request->product_id);
        }

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%")
                  ->orWhere('comment', 'like', "%$search%");
            });
        }

        if ($request->has('rating') && $request->rating != '') {
            $query->where('rating', $request->rating);
        }

        $reviews = $query->paginate(15);
        $products = Product::where('is_active', true)->orderBy('name')->get();

        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.product_reviews.table', compact('reviews'))->render(),
                'pagination' => (string) $reviews->appends($request->all())->links('pagination::bootstrap-5')
            ]);
        }

        return view('admin.product_reviews.index', compact('reviews', 'products'));
    }

    public function toggle_status($id)
    {
        $review = ProductReview::findOrFail($id);
        $review->is_approved = !$review->is_approved;
        $review->save();

        return response()->json(['success' => true, 'message' => 'Review status updated successfully', 'is_approved' => $review->is_approved]);
    }

    public function destroy($id)
    {
        $review = ProductReview::findOrFail($id);
        $review->delete();

        return response()->json(['success' => true, 'message' => 'Review deleted successfully']);
    }
}
