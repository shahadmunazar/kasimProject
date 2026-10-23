<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Warehouse;
use App\Models\WarehouseStock;
use App\Models\StockMovement;
use App\Models\StockReservation;
use App\Models\Order;
use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;

class InventoryService
{
    /**
     * Atomically reserve stock for a product (used during cart & checkout)
     */
    public function reserveStock(
        int $productId,
        int $quantity,
        ?int $warehouseId = null,
        ?string $sessionId = null,
        ?int $orderId = null,
        ?int $userId = null,
        int $ttlMinutes = 30
    ): StockReservation {
        return DB::transaction(function () use ($productId, $quantity, $warehouseId, $sessionId, $orderId, $userId, $ttlMinutes) {
            $product = Product::where('id', $productId)->lockForUpdate()->firstOrFail();

            if (!$product->track_inventory) {
                // If inventory tracking is disabled, record a nominal reservation
                return StockReservation::create([
                    'product_id' => $product->id,
                    'warehouse_id' => $warehouseId,
                    'order_id' => $orderId,
                    'user_id' => $userId,
                    'session_id' => $sessionId,
                    'quantity' => $quantity,
                    'status' => 'reserved',
                    'expires_at' => now()->addMinutes($ttlMinutes),
                ]);
            }

            $warehouse = $warehouseId ? Warehouse::find($warehouseId) : Warehouse::getDefault();
            $whId = $warehouse ? $warehouse->id : 1;

            $whStock = WarehouseStock::firstOrCreate(
                ['warehouse_id' => $whId, 'product_id' => $product->id],
                ['quantity_on_hand' => $product->stock_quantity ?? 0, 'quantity_reserved' => 0]
            );

            // Re-fetch with lock
            $whStock = WarehouseStock::where('id', $whStock->id)->lockForUpdate()->first();

            $available = max(0, $whStock->quantity_on_hand - $whStock->quantity_reserved - $whStock->damaged_quantity);

            if ($available < $quantity) {
                throw new Exception("Insufficient stock for product '{$product->name}'. Available: {$available}, Requested: {$quantity}");
            }

            // Increment reserved stock
            $whStock->increment('quantity_reserved', $quantity);

            return StockReservation::create([
                'product_id' => $product->id,
                'warehouse_id' => $whId,
                'order_id' => $orderId,
                'user_id' => $userId,
                'session_id' => $sessionId,
                'quantity' => $quantity,
                'status' => 'reserved',
                'expires_at' => now()->addMinutes($ttlMinutes),
            ]);
        });
    }

    /**
     * Release a specific stock reservation
     */
    public function releaseReservation(StockReservation $reservation): void
    {
        if ($reservation->status !== 'reserved') {
            return;
        }

        DB::transaction(function () use ($reservation) {
            if ($reservation->warehouse_id) {
                $whStock = WarehouseStock::where('warehouse_id', $reservation->warehouse_id)
                    ->where('product_id', $reservation->product_id)
                    ->lockForUpdate()
                    ->first();

                if ($whStock && $whStock->quantity_reserved > 0) {
                    $whStock->decrement('quantity_reserved', min($reservation->quantity, $whStock->quantity_reserved));
                }
            }

            $reservation->update(['status' => 'released']);
        });
    }

    /**
     * Release all expired stock reservations
     */
    public function releaseExpiredReservations(): int
    {
        $expired = StockReservation::where('status', 'reserved')
            ->where('expires_at', '<', now())
            ->get();

        $count = 0;
        foreach ($expired as $reservation) {
            $this->releaseReservation($reservation);
            $reservation->update(['status' => 'expired']);
            $count++;
        }

        return $count;
    }

    /**
     * Commit reservations to confirmed sale upon order placement
     */
    public function commitOrderSale(Order $order): void
    {
        DB::transaction(function () use ($order) {
            // Find existing reservations for this order or user/session
            $reservations = StockReservation::where('order_id', $order->id)
                ->where('status', 'reserved')
                ->get();

            $warehouse = Warehouse::getDefault();
            $whId = $warehouse ? $warehouse->id : 1;

            $items = $order->items()->with('product')->get();

            // If order has no separate order_items records (e.g. legacy direct buy), fallback to order->product_id
            if ($items->isEmpty() && $order->product_id) {
                $items = collect([
                    (object)[
                        'product_id' => $order->product_id,
                        'product' => $order->product,
                        'quantity' => $order->quantity ?: 1,
                    ]
                ]);
            }

            foreach ($items as $item) {
                $product = Product::where('id', $item->product_id)->lockForUpdate()->first();
                if (!$product) continue;

                $qty = (int)$item->quantity;
                $prevQty = (int)$product->stock_quantity;
                $newQty = max(0, $prevQty - $qty);

                if ($product->track_inventory) {
                    $product->update([
                        'stock_quantity' => $newQty,
                        'stock_status' => $newQty <= 0 ? 'out_of_stock' : ($newQty <= $product->low_stock_threshold ? 'low_stock' : 'in_stock')
                    ]);

                    // Deduct from warehouse stock
                    $whStock = WarehouseStock::firstOrCreate(
                        ['warehouse_id' => $whId, 'product_id' => $product->id],
                        ['quantity_on_hand' => $prevQty, 'quantity_reserved' => 0]
                    );

                    $whStock = WarehouseStock::where('id', $whStock->id)->lockForUpdate()->first();

                    // If reserved previously, deduct from reserved too
                    $reservedToDeduct = min($qty, (int)$whStock->quantity_reserved);
                    $whStock->update([
                        'quantity_on_hand' => max(0, $whStock->quantity_on_hand - $qty),
                        'quantity_reserved' => max(0, $whStock->quantity_reserved - $reservedToDeduct),
                    ]);

                    // Log stock movement
                    StockMovement::create([
                        'product_id' => $product->id,
                        'warehouse_id' => $whId,
                        'user_id' => $order->user_id,
                        'type' => 'order_sale',
                        'quantity' => -$qty,
                        'previous_quantity' => $prevQty,
                        'new_quantity' => $newQty,
                        'reference_type' => Order::class,
                        'reference_id' => $order->id,
                        'reference_number' => $order->order_number ?: ('ORD-' . $order->id),
                        'notes' => "Sale fulfilled for order #{$order->order_number} to customer {$order->customer_name}",
                    ]);
                }
            }

            // Mark reservations as consumed
            StockReservation::where('order_id', $order->id)
                ->where('status', 'reserved')
                ->update(['status' => 'consumed']);
        });
    }

    /**
     * Restock goods when order is cancelled, rejected, or returned
     */
    public function restockForOrder(Order $order, string $reason = 'Order cancelled', ?int $adminId = null): void
    {
        DB::transaction(function () use ($order, $reason, $adminId) {
            // Check if this order already had sale movements
            $saleMovements = StockMovement::where('reference_type', Order::class)
                ->where('reference_id', $order->id)
                ->where('type', 'order_sale')
                ->get();

            // Check if already restocked to ensure idempotency
            $alreadyRestocked = StockMovement::where('reference_type', Order::class)
                ->where('reference_id', $order->id)
                ->where('type', 'order_return')
                ->exists();

            if ($alreadyRestocked) {
                Log::info("Order #{$order->id} is already restocked. Skipping duplicate restock.");
                return;
            }

            $warehouse = Warehouse::getDefault();
            $whId = $warehouse ? $warehouse->id : 1;

            if ($saleMovements->isNotEmpty()) {
                foreach ($saleMovements as $mv) {
                    $product = Product::where('id', $mv->product_id)->lockForUpdate()->first();
                    if (!$product) continue;

                    $qtyToReturn = abs($mv->quantity);
                    $prevQty = (int)$product->stock_quantity;
                    $newQty = $prevQty + $qtyToReturn;

                    $product->update([
                        'stock_quantity' => $newQty,
                        'stock_status' => $newQty > 0 ? 'in_stock' : 'out_of_stock'
                    ]);

                    $whStock = WarehouseStock::firstOrCreate(
                        ['warehouse_id' => $mv->warehouse_id ?: $whId, 'product_id' => $product->id],
                        ['quantity_on_hand' => 0]
                    );
                    $whStock->increment('quantity_on_hand', $qtyToReturn);

                    StockMovement::create([
                        'product_id' => $product->id,
                        'warehouse_id' => $mv->warehouse_id ?: $whId,
                        'user_id' => $adminId,
                        'type' => 'order_return',
                        'quantity' => $qtyToReturn,
                        'previous_quantity' => $prevQty,
                        'new_quantity' => $newQty,
                        'reference_type' => Order::class,
                        'reference_id' => $order->id,
                        'reference_number' => $order->order_number ?: ('ORD-' . $order->id),
                        'notes' => "Stock restored: {$reason}",
                    ]);
                }
            } else {
                // If order was pending and only had reservations, release reservations
                $reservations = StockReservation::where('order_id', $order->id)
                    ->where('status', 'reserved')
                    ->get();

                foreach ($reservations as $res) {
                    $this->releaseReservation($res);
                }
            }
        });
    }

    /**
     * Manual inventory adjustment (audit corrections, damaged goods, etc.)
     */
    public function adjustStock(
        int $productId,
        int $warehouseId,
        int $newQuantity,
        string $type,
        string $reason,
        ?int $userId = null
    ): StockMovement {
        return DB::transaction(function () use ($productId, $warehouseId, $newQuantity, $type, $reason, $userId) {
            $product = Product::where('id', $productId)->lockForUpdate()->firstOrFail();
            $prevQty = (int)$product->stock_quantity;
            $diff = $newQuantity - $prevQty;

            $product->update([
                'stock_quantity' => $newQuantity,
                'stock_status' => $newQuantity <= 0 ? 'out_of_stock' : ($newQuantity <= $product->low_stock_threshold ? 'low_stock' : 'in_stock'),
            ]);

            $whStock = WarehouseStock::firstOrCreate(
                ['warehouse_id' => $warehouseId, 'product_id' => $product->id],
                ['quantity_on_hand' => 0, 'quantity_reserved' => 0]
            );
            $whStock->update(['quantity_on_hand' => $newQuantity]);

            return StockMovement::create([
                'product_id' => $product->id,
                'warehouse_id' => $warehouseId,
                'user_id' => $userId,
                'type' => $type, // manual_adjustment, damaged, etc.
                'quantity' => $diff,
                'previous_quantity' => $prevQty,
                'new_quantity' => $newQuantity,
                'reference_type' => 'ManualAdjustment',
                'reference_id' => null,
                'reference_number' => 'ADJ-' . strtoupper(uniqid()),
                'notes' => $reason,
            ]);
        });
    }

    /**
     * Receive goods from a Purchase Order
     */
    public function receivePurchaseOrder(PurchaseOrder $po, array $receivedQuantities, ?int $userId = null): void
    {
        DB::transaction(function () use ($po, $receivedQuantities, $userId) {
            $allCompleted = true;

            foreach ($po->items as $item) {
                $qtyToReceive = isset($receivedQuantities[$item->id]) ? (int)$receivedQuantities[$item->id] : 0;
                if ($qtyToReceive <= 0) continue;

                $newTotalReceived = $item->quantity_received + $qtyToReceive;
                $item->update(['quantity_received' => $newTotalReceived]);

                if ($newTotalReceived < $item->quantity_ordered) {
                    $allCompleted = false;
                }

                // Increment stock in warehouse and product
                $product = Product::where('id', $item->product_id)->lockForUpdate()->first();
                if ($product) {
                    $prevQty = (int)$product->stock_quantity;
                    $newQty = $prevQty + $qtyToReceive;

                    $product->update([
                        'stock_quantity' => $newQty,
                        'cost_price' => $item->unit_cost, // update latest cost price
                        'stock_status' => $newQty > 0 ? 'in_stock' : 'out_of_stock',
                    ]);

                    $whStock = WarehouseStock::firstOrCreate(
                        ['warehouse_id' => $po->warehouse_id, 'product_id' => $product->id],
                        ['quantity_on_hand' => 0]
                    );
                    $whStock->increment('quantity_on_hand', $qtyToReceive);

                    StockMovement::create([
                        'product_id' => $product->id,
                        'warehouse_id' => $po->warehouse_id,
                        'user_id' => $userId,
                        'type' => 'purchase_receipt',
                        'quantity' => $qtyToReceive,
                        'previous_quantity' => $prevQty,
                        'new_quantity' => $newQty,
                        'reference_type' => PurchaseOrder::class,
                        'reference_id' => $po->id,
                        'reference_number' => $po->po_number,
                        'notes' => "Received {$qtyToReceive} units against PO #{$po->po_number}",
                    ]);
                }
            }

            // Update PO status
            $totalOrdered = $po->items->sum('quantity_ordered');
            $totalReceived = $po->items->sum('quantity_received');

            if ($totalReceived >= $totalOrdered) {
                $po->update([
                    'status' => 'received',
                    'received_date' => now(),
                ]);
            } elseif ($totalReceived > 0) {
                $po->update([
                    'status' => 'partial',
                    'received_date' => now(),
                ]);
            }
        });
    }

    /**
     * Get complete inventory valuation and metrics
     */
    public function getInventorySummary(): array
    {
        $products = Product::where('track_inventory', true)->get();

        $totalProducts = $products->count();
        $totalStock = $products->sum('stock_quantity');
        $totalValuation = $products->sum(function ($p) {
            return (float)$p->stock_quantity * (float)($p->cost_price ?: $p->price * 0.7);
        });

        $lowStockCount = $products->filter(fn($p) => $p->isLowStock())->count();
        $outOfStockCount = $products->filter(fn($p) => $p->isOutOfStock())->count();
        $inStockCount = $totalProducts - $lowStockCount - $outOfStockCount;

        return [
            'total_products' => $totalProducts,
            'total_stock' => $totalStock,
            'total_valuation' => $totalValuation,
            'low_stock_count' => $lowStockCount,
            'out_of_stock_count' => $outOfStockCount,
            'in_stock_count' => max(0, $inStockCount),
        ];
    }
}
