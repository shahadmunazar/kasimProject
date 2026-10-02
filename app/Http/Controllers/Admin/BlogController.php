<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'content' => 'required',
        ]);

        $input = $request->all();
        $input['slug'] = Str::slug($request->title);

        if ($image = $request->file('image')) {
            $destinationPath = 'uploads/blogs';
            $input['image'] = $image->store($destinationPath, 'public');
        }

        Blog::create($input);

        return redirect()->route('admin.blogs.index')
                        ->with('success', 'Blog created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('admin.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $input = $request->all();
        $input['slug'] = Str::slug($request->title);

        if ($image = $request->file('image')) {
             $request->validate([
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
             ]);
            $destinationPath = 'uploads/blogs';
            
            // Delete old image if exists
            if($blog->image){
                 Storage::disk('public')->delete($blog->image);
            }
            
            $input['image'] = $image->store($destinationPath, 'public');
        } else {
            unset($input['image']);
        }

        $blog->update($input);

        return redirect()->route('admin.blogs.index')
                        ->with('success', 'Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if($blog->image){
             Storage::disk('public')->delete($blog->image);
        }
        $blog->delete();

        return redirect()->route('admin.blogs.index')
                        ->with('success', 'Blog deleted successfully');
    }
}
