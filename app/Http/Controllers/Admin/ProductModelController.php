<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductModelController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {
            return response()->json(ProductModel::with('category')->latest()->get());
        }
        $categories = Category::where('is_active', true)->get();
        return view('admin.product_models.index', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate(['name' => 'required', 'category_id' => 'required']);
        $product_model = ProductModel::create([
            'name' => $request->name,
            'slug' => Str::slug($request->slug ?: $request->name),
            'category_id' => $request->category_id,
            'is_active' => $request->is_active == '1' || $request->is_active == 'true',
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
        ]);
        return response()->json(['success' => true, 'message' => 'Created successfully', 'data' => $product_model]);
    }

    public function edit(ProductModel $product_model) {
        return response()->json($product_model);
    }

    public function update(Request $request, ProductModel $product_model) {
        $request->validate(['name' => 'required', 'category_id' => 'required']);
        $product_model->update([
            'name' => $request->name,
            'slug' => Str::slug($request->slug ?: $request->name),
            'category_id' => $request->category_id,
            'is_active' => $request->is_active == '1' || $request->is_active == 'true',
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
        ]);
        return response()->json(['success' => true, 'message' => 'Updated successfully', 'data' => $product_model]);
    }

    public function destroy(ProductModel $product_model) {
        $product_model->delete();
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }
}
