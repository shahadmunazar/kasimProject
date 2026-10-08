<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            'price' => 'nullable|numeric',
            'offer_price' => 'nullable|numeric|lte:price',
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

        $product = Product::create([
            'name' => $request->name,
            'slug' => $slug,
            'category_id' => $request->category_id,
            'product_model_id' => $request->filled('product_model_id') ? $request->product_model_id : null,
            'description' => $request->description,
            'is_active' => $request->is_active == '1' || $request->is_active == 'true',
            'price' => $request->filled('price') ? $request->price : null,
            'offer_price' => $request->filled('offer_price') ? $request->offer_price : null,
            'images' => $imagePaths,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
        ]);
        return response()->json(['success' => true, 'message' => 'Created successfully', 'data' => $product]);
    }

    public function edit(Product $product) {
        return response()->json($product);
    }

    public function update(Request $request, Product $product) {
        $request->validate([
            'name' => 'required', 
            'category_id' => 'required',
            'price' => 'nullable|numeric',
            'offer_price' => 'nullable|numeric|lte:price',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $imagePaths = $product->images ?? [];
        if ($request->hasFile('images')) {
            $imagePaths = []; // Override old images if new ones are uploaded
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('products', 'public');
            }
        }

        // Note: For AJAX file uploads, PHP uses POST for form data. But update is usually PUT.
        // We will pass _method=PUT in the form data so Laravel knows it's an update, but the actual request will be POST.

        $slug = Str::slug($request->slug ?: $request->name);
        $originalSlug = $slug;
        $count = 1;
        while (Product::where('slug', $slug)->where('id', '!=', $product->id)->exists()) {
            $slug = "{$originalSlug}-" . $count++;
        }

        $product->update([
            'name' => $request->name,
            'slug' => $slug,
            'category_id' => $request->category_id,
            'product_model_id' => $request->filled('product_model_id') ? $request->product_model_id : null,
            'description' => $request->description,
            'is_active' => $request->is_active == '1' || $request->is_active == 'true',
            'price' => $request->filled('price') ? $request->price : null,
            'offer_price' => $request->filled('offer_price') ? $request->offer_price : null,
            'images' => $imagePaths,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
        ]);
        return response()->json(['success' => true, 'message' => 'Updated successfully', 'data' => $product]);
    }

    public function destroy(Product $product) {
        $product->delete();
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }
}
