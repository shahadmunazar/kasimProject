<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ServiceCatalog;
use App\Models\Blog;
use App\Models\Product;

class SitemapController extends Controller
{
    public function index()
    {
        $urls = [];

        // 1. Static Core Pages (Main Navigation & Utilities)
        $staticPages = [
            ['url' => url('/'), 'priority' => '1.0', 'changefreq' => 'daily'],
            ['url' => url('/about-us'), 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => url('/services'), 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['url' => url('/services/embedded-systems-solutions'), 'priority' => '0.85', 'changefreq' => 'weekly'],
            ['url' => url('/services/industrial-standard-machine'), 'priority' => '0.85', 'changefreq' => 'weekly'],
            ['url' => url('/services/industrial-automation'), 'priority' => '0.85', 'changefreq' => 'weekly'],
            ['url' => url('/services/hvac-solutions'), 'priority' => '0.85', 'changefreq' => 'weekly'],
            ['url' => url('/services/software'), 'priority' => '0.85', 'changefreq' => 'weekly'],
            ['url' => url('/products'), 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['url' => url('/case-studies'), 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => url('/blogs'), 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['url' => url('/contact'), 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => url('/privacy-policy'), 'priority' => '0.4', 'changefreq' => 'yearly'],
            ['url' => url('/terms-and-conditions'), 'priority' => '0.4', 'changefreq' => 'yearly'],
            ['url' => url('/accessibility-statement'), 'priority' => '0.4', 'changefreq' => 'yearly'],
            ['url' => url('/sitemap'), 'priority' => '0.4', 'changefreq' => 'monthly'],
        ];

        foreach ($staticPages as $page) {
            $urls[] = [
                'loc' => $page['url'],
                'lastmod' => now()->toAtomString(),
                'changefreq' => $page['changefreq'],
                'priority' => $page['priority'],
            ];
        }

        // 2. The 4 Parent Service Categories
        foreach (ServiceCatalog::getCategories() as $catSlug => $category) {
            $urls[] = [
                'loc' => url('/services/' . $catSlug),
                'lastmod' => now()->toAtomString(),
                'changefreq' => 'weekly',
                'priority' => '0.9',
            ];
        }

        // 3. All Approved Individual Service Pages
        foreach (ServiceCatalog::getServices() as $servSlug => $service) {
            $urls[] = [
                'loc' => url('/services/' . $service['category_slug'] . '/' . $servSlug),
                'lastmod' => now()->toAtomString(),
                'changefreq' => 'weekly',
                'priority' => '0.85',
            ];
        }

        // 4. Active Products
        $products = Product::where('is_active', 1)->get();
        foreach ($products as $prod) {
            $urls[] = [
                'loc' => url('/product/' . $prod->slug),
                'lastmod' => ($prod->updated_at ?? now())->toAtomString(),
                'changefreq' => 'weekly',
                'priority' => '0.8',
            ];
        }

        // 5. Active Blogs
        $blogs = Blog::where('status', 1)->get();
        foreach ($blogs as $blog) {
            $urls[] = [
                'loc' => url('/blog/' . $blog->slug),
                'lastmod' => ($blog->updated_at ?? now())->toAtomString(),
                'changefreq' => 'daily',
                'priority' => '0.8',
            ];
        }

        return response()->view('sitemap.index', compact('urls'))->header('Content-Type', 'text/xml');
    }
}
