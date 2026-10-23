<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductModel;
use App\Models\Warehouse;
use App\Models\WarehouseStock;
use App\Models\StockMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {
            return response()->json(Product::with(['category', 'productModel'])->latest()->get());
        }
        $categories = Category::where('is_active', true)->get();
        $models = ProductModel::where('is_active', true)->get();
        return view('admin.products.index', compact('categories', 'models'));
    }

    public function getModelsByCategory($category_id)
    {
        $models = ProductModel::where('category_id', $category_id)
                              ->where('is_active', true)
                              ->get();
        return response()->json($models);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required', 
            'category_id' => 'required',
            'sku' => 'nullable|unique:products,sku',
            'barcode' => 'nullable|string|max:100',
            'price' => 'nullable|numeric',
            'offer_price' => 'nullable|numeric|lte:price',
            'cost_price' => 'nullable|numeric|min:0',
            'stock_quantity' => 'nullable|integer|min:0',
            'low_stock_threshold' => 'nullable|integer|min:0',
            'delivery_charge' => 'nullable|numeric|min:0',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('products', 'public');
            }
        }

        $slug = Str::slug($request->slug ?: $request->name);
        $originalSlug = $slug;
        $count = 1;
        while (Product::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-" . $count++;
        }

        $stockQty = $request->filled('stock_quantity') ? (int)$request->stock_quantity : 0;
        $sku = $request->filled('sku') 
            ? strtoupper(trim($request->sku)) 
            : 'TC-' . strtoupper(substr(preg_replace('/[^a-zA-Z0-9]/', '', $slug), 0, 8)) . '-' . rand(100, 999);

        return DB::transaction(function () use ($request, $slug, $sku, $stockQty, $imagePaths) {
            $product = Product::create([
                'name' => $request->name,
                'slug' => $slug,
                'sku' => $sku,
                'barcode' => $request->barcode,
                'category_id' => $request->category_id,
                'product_model_id' => $request->filled('product_model_id') ? $request->product_model_id : null,
                'description' => $request->description,
                'is_active' => $request->is_active == '1' || $request->is_active == 'true',
                'price' => $request->filled('price') ? $request->price : null,
                'offer_price' => $request->filled('offer_price') ? $request->offer_price : null,
                'cost_price' => $request->filled('cost_price') ? $request->cost_price : null,
                'delivery_charge' => $request->filled('delivery_charge') ? $request->delivery_charge : 0,
                'stock_quantity' => $stockQty,
                'low_stock_threshold' => $request->filled('low_stock_threshold') ? (int)$request->low_stock_threshold : 5,
                'track_inventory' => $request->has('track_inventory') ? ($request->track_inventory == '1' || $request->track_inventory == 'true') : true,
                'stock_status' => $stockQty <= 0 ? 'out_of_stock' : 'in_stock',
                'images' => $imagePaths,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
            ]);

            // Sync with default warehouse
            $defaultWh = Warehouse::getDefault();
            if ($defaultWh) {
                WarehouseStock::create([
                    'warehouse_id' => $defaultWh->id,
                    'product_id' => $product->id,
                    'quantity_on_hand' => $stockQty,
                    'quantity_reserved' => 0,
                    'reorder_level' => $product->low_stock_threshold,
                    'location_bin' => 'A1-RACK-01',
                ]);

                if ($stockQty > 0) {
                    StockMovement::create([
                        'product_id' => $product->id,
                        'warehouse_id' => $defaultWh->id,
                        'user_id' => Auth::id(),
                        'type' => 'manual_adjustment',
                        'quantity' => $stockQty,
                        'previous_quantity' => 0,
                        'new_quantity' => $stockQty,
                        'reference_type' => 'InitialStock',
                        'reference_id' => null,
                        'reference_number' => 'INIT-' . $product->id,
                        'notes' => 'Initial product creation stock',
                    ]);
                }
            }

            return response()->json(['success' => true, 'message' => 'Product created successfully', 'data' => $product]);
        });
    }

    public function edit(Product $product) {
        return response()->json($product);
    }

    public function update(Request $request, Product $product) {
        $request->validate([
            'name' => 'required', 
            'category_id' => 'required',
            'sku' => 'nullable|unique:products,sku,' . $product->id,
            'barcode' => 'nullable|string|max:100',
            'price' => 'nullable|numeric',
            'offer_price' => 'nullable|numeric|lte:price',
            'cost_price' => 'nullable|numeric|min:0',
            'stock_quantity' => 'nullable|integer|min:0',
            'low_stock_threshold' => 'nullable|integer|min:0',
            'delivery_charge' => 'nullable|numeric|min:0',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $imagePaths = $product->images ?? [];
        if ($request->hasFile('images')) {
            $imagePaths = []; // Override old images if new ones are uploaded
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('products', 'public');
            }
        }

        $slug = Str::slug($request->slug ?: $request->name);
        $originalSlug = $slug;
        $count = 1;
        while (Product::where('slug', $slug)->where('id', '!=', $product->id)->exists()) {
            $slug = "{$originalSlug}-" . $count++;
        }

        $newStock = $request->filled('stock_quantity') ? (int)$request->stock_quantity : $product->stock_quantity;
        $prevStock = (int)$product->stock_quantity;
        $sku = $request->filled('sku') ? strtoupper(trim($request->sku)) : $product->sku;

        return DB::transaction(function () use ($request, $product, $slug, $sku, $newStock, $prevStock, $imagePaths) {
            $product->update([
                'name' => $request->name,
                'slug' => $slug,
                'sku' => $sku,
                'barcode' => $request->barcode,
                'category_id' => $request->category_id,
                'product_model_id' => $request->filled('product_model_id') ? $request->product_model_id : null,
                'description' => $request->description,
                'is_active' => $request->is_active == '1' || $request->is_active == 'true',
                'price' => $request->filled('price') ? $request->price : null,
                'offer_price' => $request->filled('offer_price') ? $request->offer_price : null,
                'cost_price' => $request->filled('cost_price') ? $request->cost_price : null,
                'delivery_charge' => $request->filled('delivery_charge') ? $request->delivery_charge : 0,
                'stock_quantity' => $newStock,
                'low_stock_threshold' => $request->filled('low_stock_threshold') ? (int)$request->low_stock_threshold : $product->low_stock_threshold,
                'track_inventory' => $request->has('track_inventory') ? ($request->track_inventory == '1' || $request->track_inventory == 'true') : $product->track_inventory,
                'stock_status' => $newStock <= 0 ? 'out_of_stock' : ($newStock <= ($product->low_stock_threshold ?: 5) ? 'low_stock' : 'in_stock'),
                'images' => $imagePaths,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
            ]);

            // Sync with default warehouse if stock changed directly
            if ($newStock !== $prevStock) {
                $defaultWh = Warehouse::getDefault();
                if ($defaultWh) {
                    $whStock = WarehouseStock::firstOrCreate(
                        ['warehouse_id' => $defaultWh->id, 'product_id' => $product->id],
                        ['quantity_on_hand' => 0]
                    );
                    $whStock->update(['quantity_on_hand' => $newStock]);

                    StockMovement::create([
                        'product_id' => $product->id,
                        'warehouse_id' => $defaultWh->id,
                        'user_id' => Auth::id(),
                        'type' => 'manual_adjustment',
                        'quantity' => $newStock - $prevStock,
                        'previous_quantity' => $prevStock,
                        'new_quantity' => $newStock,
                        'reference_type' => 'ProductEdit',
                        'reference_id' => null,
                        'reference_number' => 'EDIT-' . $product->id,
                        'notes' => 'Stock adjusted via Product edit screen',
                    ]);
                }
            }

            return response()->json(['success' => true, 'message' => 'Product updated successfully', 'data' => $product]);
        });
    }

    public function destroy(Product $product) {
        $product->delete();
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }
}
