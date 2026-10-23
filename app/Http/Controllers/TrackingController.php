<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    /**
     * Show tracking page by secure tracking token or search query
     */
    public function show(Request $request, ?string $token = null)
    {
        $order = null;

        if ($token) {
            $order = Order::where('tracking_token', $token)
                ->with(['items.product', 'shipments.events', 'shipments.attempts'])
                ->first();
        } elseif ($request->filled('order_number') && $request->filled('phone')) {
            $order = Order::where('order_number', trim($request->order_number))
                ->where('mobile', trim($request->phone))
                ->with(['items.product', 'shipments.events', 'shipments.attempts'])
                ->first();

            if (!$order) {
                return view('tracking.index', [
                    'order' => null,
                    'searched' => true,
                    'error' => 'No matching order found for this order number and mobile phone.'
                ]);
            }
        }

        return view('tracking.index', [
            'order' => $order,
            'searched' => ($token !== null || $request->filled('order_number')),
            'error' => null
        ]);
    }
}
