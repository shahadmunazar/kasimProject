<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $totalBlogs = \App\Models\Blog::count();
        $activeBlogs = \App\Models\Blog::where('status', 1)->count();
        $inactiveBlogs = \App\Models\Blog::where('status', 0)->count();
        $totalViews = \App\Models\Blog::sum('views');
        $totalContacts = \App\Models\Contact::count();
        $totalVisitors = \App\Models\Visitor::count();
        
        $totalProducts = \App\Models\Product::count();
        $totalCategories = \App\Models\Category::count();
        $totalModels = \App\Models\ProductModel::count();
        $totalOrders = \App\Models\Order::count();
        $totalUsers = \App\Models\User::count();
        $totalReviews = \App\Models\ProductReview::count();
        $totalInquiries = \App\Models\ProductInquiry::count();

        return view('admin.dashboard', compact(
            'totalBlogs', 'activeBlogs', 'inactiveBlogs', 'totalViews', 'totalContacts', 'totalVisitors',
            'totalProducts', 'totalCategories', 'totalModels', 'totalOrders', 'totalUsers', 'totalReviews', 'totalInquiries'
        ));
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
