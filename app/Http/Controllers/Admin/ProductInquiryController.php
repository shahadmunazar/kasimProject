<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductInquiry;

class ProductInquiryController extends Controller
{
    public function index(Request $request)
    {
        $query = ProductInquiry::with('product')->latest();

        if ($request->filled('product_name')) {
            $query->whereHas('product', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->product_name . '%');
            });
        }

        if ($request->filled('user_name')) {
            $query->where('name', 'like', '%' . $request->user_name . '%');
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $inquiries = $query->paginate(10);

        if ($request->ajax()) {
            return response()->json($inquiries);
        }

        return view('admin.product_inquiries.index', compact('inquiries'));
    }
}
