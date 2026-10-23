<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderItem;
use App\Models\Supplier;
use App\Models\Warehouse;
use App\Models\Product;
use App\Services\InventoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PurchaseOrderController extends Controller
{
    protected InventoryService $inventoryService;

    public function __construct(InventoryService $inventoryService)
    {
        $this->inventoryService = $inventoryService;
    }

    public function index(Request $request)
    {
        $query = PurchaseOrder::with(['supplier', 'warehouse', 'creator'])->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $purchaseOrders = $query->paginate(15);
        $suppliers = Supplier::where('is_active', true)->get();
        $warehouses = Warehouse::where('is_active', true)->get();
        $products = Product::where('track_inventory', true)->get(['id', 'name', 'sku', 'cost_price', 'price']);

        return view('admin.purchase_orders.index', compact('purchaseOrders', 'suppliers', 'warehouses', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'warehouse_id' => 'required|exists:warehouses,id',
            'order_date' => 'required|date',
            'expected_delivery_date' => 'nullable|date',
            'notes' => 'nullable|string',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.unit_cost' => 'required|numeric|min:0',
        ]);

        return DB::transaction(function () use ($request) {
            $poNumber = 'PO-' . date('Ym') . '-' . strtoupper(substr(uniqid(), -5));

            $totalAmount = 0;
            foreach ($request->items as $itemData) {
                $totalAmount += ((int)$itemData['quantity'] * (float)$itemData['unit_cost']);
            }

            $po = PurchaseOrder::create([
                'po_number' => $poNumber,
                'supplier_id' => $request->supplier_id,
                'warehouse_id' => $request->warehouse_id,
                'created_by' => Auth::id(),
                'status' => 'ordered',
                'total_amount' => $totalAmount,
                'order_date' => $request->order_date,
                'expected_delivery_date' => $request->expected_delivery_date,
                'notes' => $request->notes,
            ]);

            foreach ($request->items as $itemData) {
                PurchaseOrderItem::create([
                    'purchase_order_id' => $po->id,
                    'product_id' => $itemData['product_id'],
                    'quantity_ordered' => $itemData['quantity'],
                    'quantity_received' => 0,
                    'unit_cost' => $itemData['unit_cost'],
                    'total_cost' => (int)$itemData['quantity'] * (float)$itemData['unit_cost'],
                ]);
            }

            return redirect()->route('admin.purchase_orders.show', $po->id)->with('success', "Purchase order #{$po->po_number} created successfully!");
        });
    }

    public function show(PurchaseOrder $purchaseOrder)
    {
        $purchaseOrder->load(['supplier', 'warehouse', 'creator', 'items.product']);
        return view('admin.purchase_orders.show', compact('purchaseOrder'));
    }

    /**
     * Physical Goods Receipt into Warehouse
     */
    public function receive(Request $request, PurchaseOrder $purchaseOrder)
    {
        $request->validate([
            'received' => 'required|array',
            'received.*' => 'nullable|integer|min:0',
        ]);

        $this->inventoryService->receivePurchaseOrder($purchaseOrder, $request->received, Auth::id());

        return redirect()->route('admin.purchase_orders.show', $purchaseOrder->id)->with('success', 'Physical goods receipt recorded and stock updated into warehouse!');
    }
}
