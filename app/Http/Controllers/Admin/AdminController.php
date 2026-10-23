<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Visitor;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductModel;
use App\Models\Order;
use App\Models\User;
use App\Models\ProductReview;
use App\Models\ProductInquiry;
use App\Models\Shipment;
use App\Models\StockMovement;
use App\Services\InventoryService;

class AdminController extends Controller
{
    public function index()
    {
        $totalBlogs = Blog::count();
        $activeBlogs = Blog::where('status', 1)->count();
        $inactiveBlogs = Blog::where('status', 0)->count();
        $totalViews = Blog::sum('views');
        $totalContacts = Contact::count();
        $totalVisitors = Visitor::count();
        
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalModels = ProductModel::count();
        $totalOrders = Order::count();
        $totalUsers = User::count();
        $totalReviews = ProductReview::count();
        $totalInquiries = ProductInquiry::count();

        // Advanced Inventory & Logistics Metrics
        $inventorySummary = (new InventoryService())->getInventorySummary();
        $totalStock = $inventorySummary['total_stock'];
        $totalValuation = $inventorySummary['total_valuation'];
        $lowStockCount = $inventorySummary['low_stock_count'];
        $outOfStockCount = $inventorySummary['out_of_stock_count'];

        $pendingShipmentsCount = Shipment::whereIn('status', ['pending', 'packed', 'ready_for_pickup'])->count();
        $inTransitCount = Shipment::whereIn('status', ['shipped', 'in_transit', 'out_for_delivery'])->count();
        $deliveredShipmentsCount = Shipment::where('status', 'delivered')->count();

        $recentOrders = Order::with(['product', 'items.product', 'latestShipment'])->latest()->take(5)->get();
        $recentMovements = StockMovement::with(['product', 'warehouse'])->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalBlogs', 'activeBlogs', 'inactiveBlogs', 'totalViews', 'totalContacts', 'totalVisitors',
            'totalProducts', 'totalCategories', 'totalModels', 'totalOrders', 'totalUsers', 'totalReviews', 'totalInquiries',
            'totalStock', 'totalValuation', 'lowStockCount', 'outOfStockCount',
            'pendingShipmentsCount', 'inTransitCount', 'deliveredShipmentsCount',
            'recentOrders', 'recentMovements'
        ));
    }

    public function login()
    {
        if (Auth::check()) {
            if (Auth::user()->isDelivery()) {
                return redirect()->route('delivery.dashboard');
            }
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
            $user = Auth::user();

            if (!$user->is_active) {
                Auth::logout();
                $request->session()->invalidate();
                return back()->withErrors(['email' => 'Your account has been deactivated.']);
            }

            $request->session()->regenerate();

            if ($user->isDelivery()) {
                return redirect()->intended(route('delivery.dashboard'));
            }

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
