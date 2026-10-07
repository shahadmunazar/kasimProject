<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('product')->latest()->paginate(15);
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,disapproved,dispatched',
        ]);

        $order->status = $request->status;
        $order->is_confirmed = in_array($request->status, ['approved', 'dispatched']);
        $order->save();

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Order status updated successfully!',
                'status' => $order->status
            ]);
        }

        return redirect()->back()->with('success', 'Order status updated successfully!');
    }
}
