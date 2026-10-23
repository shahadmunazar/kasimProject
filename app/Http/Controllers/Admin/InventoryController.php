<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Warehouse;
use App\Models\WarehouseStock;
use App\Models\StockMovement;
use App\Services\InventoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class InventoryController extends Controller
{
    protected InventoryService $inventoryService;

    public function __construct(InventoryService $inventoryService)
    {
        $this->inventoryService = $inventoryService;
    }

    public function index(Request $request)
    {
        $summary = $this->inventoryService->getInventorySummary();

        $query = Product::with(['category', 'warehouseStocks.warehouse'])
            ->where('track_inventory', true)
            ->latest();

        if ($request->filled('filter')) {
            if ($request->filter === 'low') {
                $query->whereColumn('stock_quantity', '<=', 'low_stock_threshold')->where('stock_quantity', '>', 0);
            } elseif ($request->filter === 'out') {
                $query->where('stock_quantity', '<=', 0);
            } elseif ($request->filter === 'in') {
                $query->whereColumn('stock_quantity', '>', 'low_stock_threshold');
            }
        }

        if ($request->filled('search')) {
            $term = $request->search;
            $query->where(function ($q) use ($term) {
                $q->where('name', 'like', "%{$term}%")
                  ->orWhere('sku', 'like', "%{$term}%")
                  ->orWhere('barcode', 'like', "%{$term}%");
            });
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $products = $query->paginate(15)->withQueryString();
        $warehouses = Warehouse::where('is_active', true)->get();
        $categories = \App\Models\Category::all();

        return view('admin.inventory.index', compact('products', 'summary', 'warehouses', 'categories'));
    }

    public function adjust(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'warehouse_id' => 'required|exists:warehouses,id',
            'quantity' => 'required|integer|min:0',
            'type' => 'required|in:manual_adjustment,damaged,purchase_receipt',
            'reason' => 'required|string|max:500',
        ]);

        $movement = $this->inventoryService->adjustStock(
            (int)$request->product_id,
            (int)$request->warehouse_id,
            (int)$request->quantity,
            $request->type,
            $request->reason,
            Auth::id()
        );

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Stock successfully adjusted!',
                'movement' => $movement,
            ]);
        }

        return redirect()->back()->with('success', 'Stock adjusted successfully!');
    }

    public function movements(Request $request)
    {
        $query = StockMovement::with(['product', 'warehouse', 'user'])->latest();

        if ($request->filled('product_id')) {
            $query->where('product_id', $request->product_id);
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('search')) {
            $term = $request->search;
            $query->where(function ($q) use ($term) {
                $q->where('reference_number', 'like', "%{$term}%")
                  ->orWhere('notes', 'like', "%{$term}%")
                  ->orWhereHas('product', function ($pq) use ($term) {
                      $pq->where('name', 'like', "%{$term}%")->orWhere('sku', 'like', "%{$term}%");
                  });
            });
        }

        $movements = $query->paginate(20)->withQueryString();
        $products = Product::where('track_inventory', true)->get(['id', 'name', 'sku']);

        return view('admin.inventory.movements', compact('movements', 'products'));
    }

    public function exportCsv()
    {
        $products = Product::with(['category', 'warehouseStocks.warehouse'])->get();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="tc_smart_inventory_' . date('Y-m-d') . '.csv"',
        ];

        $callback = function () use ($products) {
            $file = fopen('php://output', 'w');
            fputcsv($file, [
                'Product ID',
                'Product Name',
                'SKU',
                'Barcode',
                'Category',
                'Selling Price',
                'Cost Price',
                'Total Stock',
                'Reorder Level',
                'Stock Status',
                'Total Valuation'
            ]);

            foreach ($products as $p) {
                $cost = (float)($p->cost_price ?: $p->price * 0.7);
                $valuation = (float)$p->stock_quantity * $cost;

                fputcsv($file, [
                    $p->id,
                    $p->name,
                    $p->sku,
                    $p->barcode,
                    $p->category ? $p->category->name : 'N/A',
                    $p->price,
                    $p->cost_price,
                    $p->stock_quantity,
                    $p->low_stock_threshold,
                    $p->stock_status,
                    number_format($valuation, 2, '.', '')
                ]);
            }
            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }

    public function importCsv(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt|max:4096',
            'warehouse_id' => 'required|exists:warehouses,id',
        ]);

        $file = fopen($request->file('csv_file')->getRealPath(), 'r');
        $header = fgetcsv($file);

        $updatedCount = 0;
        $warehouseId = (int)$request->warehouse_id;

        while (($row = fgetcsv($file)) !== false) {
            // Assume format: [id_or_sku, new_quantity, optional_cost_price]
            if (empty($row[0])) continue;

            $identifier = trim($row[0]);
            $newQty = isset($row[1]) ? (int)trim($row[1]) : null;
            $newCost = isset($row[2]) ? (float)trim($row[2]) : null;

            if ($newQty === null || $newQty < 0) continue;

            $product = is_numeric($identifier)
                ? Product::find($identifier)
                : Product::where('sku', $identifier)->first();

            if ($product) {
                $this->inventoryService->adjustStock(
                    $product->id,
                    $warehouseId,
                    $newQty,
                    'manual_adjustment',
                    'Bulk CSV Inventory Import',
                    Auth::id()
                );

                if ($newCost !== null && $newCost > 0) {
                    $product->update(['cost_price' => $newCost]);
                }

                $updatedCount++;
            }
        }

        fclose($file);

        return redirect()->back()->with('success', "Successfully reconciled {$updatedCount} inventory items from CSV.");
    }
}
