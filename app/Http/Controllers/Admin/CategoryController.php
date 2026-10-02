<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {
            return response()->json(Category::latest()->get());
        }
        return view('admin.categories.index');
    }

    public function store(Request $request) {
        $request->validate(['name' => 'required']);
        $category = Category::create([
            'name' => $request->name, 
            'slug' => Str::slug($request->slug ?: $request->name), 
            'is_active' => $request->is_active == '1' || $request->is_active == 'true',
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description
        ]);
        return response()->json(['success' => true, 'message' => 'Created successfully', 'data' => $category]);
    }

    public function edit(Category $category) {
        return response()->json($category);
    }

    public function update(Request $request, Category $category) {
        $request->validate(['name' => 'required']);
        $category->update([
            'name' => $request->name, 
            'slug' => Str::slug($request->slug ?: $request->name), 
            'is_active' => $request->is_active == '1' || $request->is_active == 'true',
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description
        ]);
        return response()->json(['success' => true, 'message' => 'Updated successfully', 'data' => $category]);
    }

    public function destroy(Category $category) {
        $category->delete();
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }
}
