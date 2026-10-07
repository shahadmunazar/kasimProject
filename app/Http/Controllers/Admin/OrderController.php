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
            'expected_delivery_date' => 'nullable|date|required_if:status,approved',
        ]);

        $order->status = $request->status;
        $order->is_confirmed = in_array($request->status, ['approved', 'dispatched']);
        
        if ($request->has('expected_delivery_date') && in_array($request->status, ['approved', 'dispatched'])) {
            $order->expected_delivery_date = $request->expected_delivery_date;
        }

        $order->save();

        try {
            if ($order->email) {
                \Illuminate\Support\Facades\Mail::to($order->email)->send(new \App\Mail\OrderStatusUpdated($order));
            }
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to send status update email: ' . $e->getMessage());
        }

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
