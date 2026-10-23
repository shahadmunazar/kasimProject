<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\DeliveryPersonnel;
use App\Models\Warehouse;
use App\Models\Shipment;
use App\Models\ShipmentItem;
use App\Models\ShipmentEvent;
use App\Services\InventoryService;
use App\Helpers\CourierHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with(['product', 'items.product', 'latestShipment'])->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('payment_status')) {
            $query->where('payment_status', $request->payment_status);
        }

        if ($request->filled('search')) {
            $term = $request->search;
            $query->where(function ($q) use ($term) {
                $q->where('order_number', 'like', "%{$term}%")
                  ->orWhere('customer_name', 'like', "%{$term}%")
                  ->orWhere('mobile', 'like', "%{$term}%")
                  ->orWhere('email', 'like', "%{$term}%");
            });
        }

        $orders = $query->paginate(15)->withQueryString();
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load(['product', 'items.product', 'shipments.events', 'shipments.deliveryPersonnel.user', 'shipments.attempts']);
        $deliveryStaff = DeliveryPersonnel::with('user')->where('is_available', true)->get();
        $warehouses = Warehouse::where('is_active', true)->get();

        return view('admin.orders.show', compact('order', 'deliveryStaff', 'warehouses'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,disapproved,processing,packed,dispatched,delivered,cancelled',
            'expected_delivery_date' => 'nullable|date',
            'payment_status' => 'nullable|in:pending,paid,failed,refunded',
            'admin_notes' => 'nullable|string',
        ]);

        $prevStatus = $order->status;
        $newStatus = $request->status;

        $order->status = $newStatus;
        $order->is_confirmed = in_array($newStatus, ['approved', 'processing', 'packed', 'dispatched', 'delivered']);

        if ($request->filled('payment_status')) {
            $order->payment_status = $request->payment_status;
        } elseif (in_array($newStatus, ['approved', 'processing', 'packed', 'dispatched', 'delivered'])) {
            $order->payment_status = 'paid';
        }

        if ($request->filled('admin_notes')) {
            $order->admin_notes = $request->admin_notes;
        }

        if ($request->filled('expected_delivery_date')) {
            $order->expected_delivery_date = $request->expected_delivery_date;
        }

        // Restock inventory if order was disapproved or cancelled
        if (in_array($newStatus, ['disapproved', 'cancelled']) && !in_array($prevStatus, ['disapproved', 'cancelled'])) {
            $inventoryService = new InventoryService();
            $inventoryService->restockForOrder($order, "Order status changed to {$newStatus} by admin", Auth::id());
            $order->payment_status = ($newStatus === 'cancelled' && $order->payment_status === 'paid') ? 'refunded' : 'failed';
            $order->cancelled_at = now();
        }

        if ($newStatus === 'delivered') {
            $order->delivery_status = 'delivered';
        } elseif ($newStatus === 'dispatched' && $order->delivery_status === 'processing') {
            $order->delivery_status = 'shipped';
        }

        $order->save();

        // If marked delivered, update any active shipments or create completed delivery shipment
        if ($newStatus === 'delivered') {
            $activeShipments = $order->shipments;
            if ($activeShipments->isNotEmpty()) {
                foreach ($activeShipments as $shipment) {
                    $shipment->update([
                        'status' => 'delivered',
                        'delivered_at' => $shipment->delivered_at ?: now(),
                        'recipient_name' => $shipment->recipient_name ?: $order->customer_name,
                    ]);

                    ShipmentEvent::create([
                        'shipment_id' => $shipment->id,
                        'status' => 'delivered',
                        'location' => $order->city ?: 'Delivery Address',
                        'description' => 'Delivered to customer (Confirmed by Admin manually)',
                        'source' => 'admin',
                        'event_timestamp' => now(),
                    ]);
                }
            } else {
                $defaultWarehouse = Warehouse::where('is_default', true)->first() ?? Warehouse::first();
                $shipment = Shipment::create([
                    'shipment_number' => 'SHP-' . strtoupper(Str::random(10)),
                    'order_id' => $order->id,
                    'warehouse_id' => $defaultWarehouse ? $defaultWarehouse->id : null,
                    'delivery_type' => $order->delivery_type ?: 'manual',
                    'courier_name' => $order->effective_courier_name ?: 'Direct Delivery',
                    'awb_number' => $order->effective_tracking_id,
                    'tracking_number' => $order->effective_tracking_id,
                    'tracking_url' => $order->effective_tracking_url,
                    'status' => 'delivered',
                    'shipped_at' => $order->shipped_at ?: now(),
                    'delivered_at' => now(),
                    'recipient_name' => $order->customer_name,
                ]);

                if ($order->items && $order->items->isNotEmpty()) {
                    foreach ($order->items as $item) {
                        ShipmentItem::create([
                            'shipment_id' => $shipment->id,
                            'order_item_id' => $item->id,
                            'product_id' => $item->product_id,
                            'quantity' => $item->quantity,
                        ]);
                    }
                } elseif ($order->product_id) {
                    ShipmentItem::create([
                        'shipment_id' => $shipment->id,
                        'order_item_id' => null,
                        'product_id' => $order->product_id,
                        'quantity' => $order->quantity ?: 1,
                    ]);
                }

                ShipmentEvent::create([
                    'shipment_id' => $shipment->id,
                    'status' => 'delivered',
                    'location' => $order->city ?: 'Delivery Address',
                    'description' => 'Delivered to customer (Confirmed by Admin manually)',
                    'source' => 'admin',
                    'event_timestamp' => now(),
                ]);
            }
        }

        // Send email notification safely
        try {
            if ($order->email) {
                \Illuminate\Support\Facades\Mail::to($order->email)->send(new \App\Mail\OrderStatusUpdated($order));
            }
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to send status update email: ' . $e->getMessage());
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Order status updated successfully!',
                'status' => $order->status,
                'delivery_status' => $order->effective_delivery_status,
                'payment_status' => $order->payment_status
            ]);
        }

        return redirect()->back()->with('success', 'Order status updated successfully!');
    }

    /**
     * Quick manual delivery confirmation by admin
     */
    public function markDelivered(Request $request, Order $order)
    {
        $order->status = 'delivered';
        $order->delivery_status = 'delivered';
        $order->is_confirmed = true;
        if ($order->payment_status !== 'paid') {
            $order->payment_status = 'paid';
        }
        $order->save();

        $shipments = $order->shipments;
        if ($shipments->isNotEmpty()) {
            foreach ($shipments as $shipment) {
                $shipment->update([
                    'status' => 'delivered',
                    'delivered_at' => $shipment->delivered_at ?: now(),
                    'recipient_name' => $shipment->recipient_name ?: $order->customer_name,
                ]);

                ShipmentEvent::create([
                    'shipment_id' => $shipment->id,
                    'status' => 'delivered',
                    'location' => $order->city ?: 'Delivery Address',
                    'description' => 'Delivery manually confirmed by Admin.',
                    'source' => 'admin',
                    'event_timestamp' => now(),
                ]);
            }
        } else {
            $defaultWarehouse = Warehouse::where('is_default', true)->first() ?? Warehouse::first();
            $shipment = Shipment::create([
                'shipment_number' => 'SHP-' . strtoupper(Str::random(10)),
                'order_id' => $order->id,
                'warehouse_id' => $defaultWarehouse ? $defaultWarehouse->id : null,
                'delivery_type' => $order->delivery_type ?: 'manual',
                'courier_name' => $order->effective_courier_name ?: 'Direct Delivery',
                'awb_number' => $order->effective_tracking_id,
                'tracking_number' => $order->effective_tracking_id,
                'tracking_url' => $order->effective_tracking_url,
                'status' => 'delivered',
                'shipped_at' => $order->shipped_at ?: now(),
                'delivered_at' => now(),
                'recipient_name' => $order->customer_name,
            ]);

            if ($order->items && $order->items->isNotEmpty()) {
                foreach ($order->items as $item) {
                    ShipmentItem::create([
                        'shipment_id' => $shipment->id,
                        'order_item_id' => $item->id,
                        'product_id' => $item->product_id,
                        'quantity' => $item->quantity,
                    ]);
                }
            } elseif ($order->product_id) {
                ShipmentItem::create([
                    'shipment_id' => $shipment->id,
                    'order_item_id' => null,
                    'product_id' => $order->product_id,
                    'quantity' => $order->quantity ?: 1,
                ]);
            }

            ShipmentEvent::create([
                'shipment_id' => $shipment->id,
                'status' => 'delivered',
                'location' => $order->city ?: 'Delivery Address',
                'description' => 'Delivery manually confirmed by Admin.',
                'source' => 'admin',
                'event_timestamp' => now(),
            ]);
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Order marked as Delivered successfully!',
                'status' => 'delivered',
                'delivery_status' => 'delivered',
                'payment_status' => $order->payment_status,
            ]);
        }

        return redirect()->back()->with('success', 'Order marked as Delivered successfully!');
    }

    /**
     * Dispatch or book shipment for an order
     */
    /**
     * Dispatch or book shipment for an order (Manual in-house or courier)
     */
    public function createShipment(Request $request, Order $order)
    {
        $request->validate([
            'delivery_type' => 'required|in:manual,courier',
            'warehouse_id' => 'required|exists:warehouses,id',
            'delivery_personnel_id' => 'nullable|required_if:delivery_type,manual|exists:delivery_personnel,id',
            'courier_partner' => 'nullable|required_if:delivery_type,courier|string|max:100',
            'custom_courier_name' => 'nullable|required_if:courier_partner,Other|string|max:100',
            'tracking_id' => 'nullable|required_if:delivery_type,courier|string|max:100',
            'tracking_url' => 'nullable|required_if:delivery_type,courier|url|max:1000',
            'estimated_delivery_date' => 'nullable|date',
            'delivery_notes' => 'nullable|string|max:500',
        ]);

        return DB::transaction(function () use ($request, $order) {
            $shipmentNumber = 'SHP-' . strtoupper(uniqid());
            $courierName = null;
            $trackingId = null;
            $trackingUrl = null;

            if ($request->delivery_type === 'courier') {
                $courierName = $request->courier_partner === 'Other'
                    ? trim($request->custom_courier_name)
                    : trim($request->courier_partner);
                $trackingId = trim($request->tracking_id);
                $trackingUrl = trim($request->tracking_url) ?: CourierHelper::buildTrackingUrl($courierName, $trackingId);
            }

            $shipment = Shipment::create([
                'shipment_number' => $shipmentNumber,
                'order_id' => $order->id,
                'warehouse_id' => $request->warehouse_id,
                'delivery_type' => $request->delivery_type,
                'delivery_personnel_id' => $request->delivery_type === 'manual' ? $request->delivery_personnel_id : null,
                'courier_code' => $courierName ? Str::slug($courierName) : null,
                'courier_name' => $courierName,
                'awb_number' => $trackingId,
                'tracking_number' => $trackingId,
                'tracking_url' => $trackingUrl,
                'status' => 'shipped',
                'shipped_at' => now(),
                'estimated_delivery_date' => $request->estimated_delivery_date ?: $order->expected_delivery_date,
                'delivery_notes' => $request->delivery_notes,
            ]);

            // Add items to shipment
            $items = $order->items;
            if ($items->isEmpty() && $order->product_id) {
                ShipmentItem::create([
                    'shipment_id' => $shipment->id,
                    'order_item_id' => null,
                    'product_id' => $order->product_id,
                    'quantity' => $order->quantity ?: 1,
                ]);
            } else {
                foreach ($items as $item) {
                    ShipmentItem::create([
                        'shipment_id' => $shipment->id,
                        'order_item_id' => $item->id,
                        'product_id' => $item->product_id,
                        'quantity' => $item->quantity,
                    ]);
                }
            }

            if ($request->delivery_type === 'courier') {
                $order->update([
                    'courier_name' => $courierName,
                    'tracking_id' => $trackingId,
                    'tracking_url' => $trackingUrl,
                    'shipped_at' => now(),
                    'delivery_status' => 'shipped',
                    'status' => 'dispatched',
                    'delivery_type' => 'courier',
                ]);

                ShipmentEvent::create([
                    'shipment_id' => $shipment->id,
                    'status' => 'shipped',
                    'location' => 'Logistics Hub',
                    'description' => "Consignment dispatched via {$courierName}. Tracking / AWB: {$trackingId}.",
                    'source' => 'admin',
                    'event_timestamp' => now(),
                ]);
            } else {
                $staff = DeliveryPersonnel::with('user')->find($request->delivery_personnel_id);
                $staffName = $staff && $staff->user ? $staff->user->name : 'Assigned Staff';
                $shipment->update([
                    'status' => 'shipped',
                    'courier_name' => "In-House Fleet ({$staffName})",
                    'shipped_at' => now(),
                ]);

                $order->update([
                    'courier_name' => "In-House Fleet ({$staffName})",
                    'shipped_at' => now(),
                    'delivery_status' => 'shipped',
                    'status' => 'dispatched',
                    'delivery_type' => 'manual',
                ]);

                ShipmentEvent::create([
                    'shipment_id' => $shipment->id,
                    'status' => 'shipped',
                    'location' => 'Fulfillment Hub',
                    'description' => "Handed over to delivery personnel: {$staffName}",
                    'source' => 'admin',
                    'event_timestamp' => now(),
                ]);
            }

            return redirect()->back()->with('success', "Shipment #{$shipment->shipment_number} dispatched successfully!");
        });
    }

    /**
     * Manually manage/update courier delivery tracking details for an order (Without Shiprocket)
     */
    public function updateShipment(Request $request, Order $order)
    {
        $request->validate([
            'courier_partner' => 'required|string|max:100',
            'custom_courier_name' => 'nullable|required_if:courier_partner,Other|string|max:100',
            'tracking_id' => 'required|string|max:100',
            'tracking_url' => 'required|url|max:1000',
            'shipped_at' => 'nullable|date',
            'delivery_status' => 'required|in:processing,ready_to_ship,shipped,in_transit,out_for_delivery,delivered,delivery_failed',
            'delivery_notes' => 'nullable|string|max:500',
        ]);

        return DB::transaction(function () use ($request, $order) {
            // Determine courier name
            $courierName = $request->courier_partner === 'Other'
                ? trim($request->custom_courier_name)
                : trim($request->courier_partner);

            $trackingId = trim($request->tracking_id);
            $trackingUrl = trim($request->tracking_url);
            $deliveryStatus = $request->delivery_status;

            // Determine shipment date
            $shippedAt = null;
            if ($request->filled('shipped_at')) {
                $shippedAt = \Carbon\Carbon::parse($request->shipped_at);
            } elseif (in_array($deliveryStatus, ['shipped', 'in_transit', 'out_for_delivery', 'delivered'])) {
                $shippedAt = $order->shipped_at ?: now();
            }

            // Sync with overall order status
            $orderStatus = $order->status;
            if ($deliveryStatus === 'delivered') {
                $orderStatus = 'delivered';
                $order->is_confirmed = true;
                $order->payment_status = 'paid';
            } elseif (in_array($deliveryStatus, ['shipped', 'in_transit', 'out_for_delivery'])) {
                if ($orderStatus !== 'delivered') {
                    $orderStatus = 'dispatched';
                }
            } elseif ($deliveryStatus === 'ready_to_ship') {
                if (!in_array($orderStatus, ['dispatched', 'delivered'])) {
                    $orderStatus = 'packed';
                }
            } elseif ($deliveryStatus === 'processing') {
                if (!in_array($orderStatus, ['dispatched', 'delivered'])) {
                    $orderStatus = 'processing';
                }
            }

            // Update order record
            $order->update([
                'courier_name' => $courierName,
                'tracking_id' => $trackingId,
                'tracking_url' => $trackingUrl,
                'shipped_at' => $shippedAt,
                'delivery_status' => $deliveryStatus,
                'delivery_type' => 'courier',
                'status' => $orderStatus,
                'is_confirmed' => in_array($orderStatus, ['approved', 'processing', 'packed', 'dispatched', 'delivered']),
                'payment_status' => $deliveryStatus === 'delivered' ? 'paid' : $order->payment_status,
            ]);

            // Sync or create associated Shipment model
            $defaultWarehouse = Warehouse::where('is_default', true)->first() ?? Warehouse::first();
            $warehouseId = $defaultWarehouse ? $defaultWarehouse->id : null;

            $shipment = $order->latestShipment;
            if (!$shipment) {
                $shipmentNumber = 'SHP-' . strtoupper(Str::random(10));
                $shipment = Shipment::create([
                    'shipment_number' => $shipmentNumber,
                    'order_id' => $order->id,
                    'warehouse_id' => $warehouseId,
                    'delivery_type' => 'courier',
                    'courier_code' => Str::slug($courierName),
                    'courier_name' => $courierName,
                    'awb_number' => $trackingId,
                    'tracking_number' => $trackingId,
                    'tracking_url' => $trackingUrl,
                    'status' => $deliveryStatus,
                    'shipped_at' => $shippedAt,
                    'delivered_at' => $deliveryStatus === 'delivered' ? now() : null,
                    'recipient_name' => $deliveryStatus === 'delivered' ? $order->customer_name : null,
                    'estimated_delivery_date' => $order->expected_delivery_date,
                    'delivery_notes' => $request->delivery_notes,
                ]);

                // Attach items to shipment
                if ($order->items && $order->items->isNotEmpty()) {
                    foreach ($order->items as $item) {
                        ShipmentItem::create([
                            'shipment_id' => $shipment->id,
                            'order_item_id' => $item->id,
                            'product_id' => $item->product_id,
                            'quantity' => $item->quantity,
                        ]);
                    }
                } elseif ($order->product_id) {
                    ShipmentItem::create([
                        'shipment_id' => $shipment->id,
                        'order_item_id' => null,
                        'product_id' => $order->product_id,
                        'quantity' => $order->quantity ?: 1,
                    ]);
                }
            } else {
                $shipment->update([
                    'delivery_type' => 'courier',
                    'courier_code' => Str::slug($courierName),
                    'courier_name' => $courierName,
                    'awb_number' => $trackingId,
                    'tracking_number' => $trackingId,
                    'tracking_url' => $trackingUrl,
                    'status' => $deliveryStatus,
                    'shipped_at' => $shippedAt ?: $shipment->shipped_at,
                    'delivered_at' => $deliveryStatus === 'delivered' ? ($shipment->delivered_at ?: now()) : $shipment->delivered_at,
                    'recipient_name' => $deliveryStatus === 'delivered' ? ($shipment->recipient_name ?: $order->customer_name) : $shipment->recipient_name,
                    'delivery_notes' => $request->delivery_notes ?: $shipment->delivery_notes,
                ]);
            }

            // Record event in tracking timeline
            $statusLabel = CourierHelper::getStatusLabel($deliveryStatus);
            ShipmentEvent::create([
                'shipment_id' => $shipment->id,
                'status' => $deliveryStatus,
                'location' => $order->city ?: 'Logistics Hub',
                'description' => "Shipment details updated. Courier: {$courierName}, Tracking ID / AWB: {$trackingId}. Status: {$statusLabel}.",
                'source' => 'admin',
                'event_timestamp' => now(),
            ]);

            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Shipment information saved successfully!',
                    'courier_name' => $courierName,
                    'tracking_id' => $trackingId,
                    'tracking_url' => $trackingUrl,
                    'delivery_status' => $deliveryStatus,
                    'delivery_status_label' => $statusLabel,
                    'shipped_at' => $shippedAt ? $shippedAt->format('M d, Y') : null,
                ]);
            }

            return redirect()->back()->with('success', "Shipment information for Order #{$order->order_number} saved successfully!");
        });
    }
}
