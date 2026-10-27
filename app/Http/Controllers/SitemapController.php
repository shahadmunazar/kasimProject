<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ServiceCatalog;
use App\Models\Blog;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductModel;

class SitemapController extends Controller
{
    /**
     * Handle incoming request for /sitemap.xml
     */
    public function index(Request $request)
    {
        $baseUrl = $request->root();
        $urls = $this->collectAllUrls($baseUrl);

        $xml = view('sitemap.index', compact('urls'))->render();

        // Ensure physical public/sitemap.xml is updated/saved
        try {
            @file_put_contents(public_path('sitemap.xml'), $xml);
        } catch (\Throwable $e) {
            // Silently fail if file write fails in constrained environments
        }

        return response($xml, 200)
            ->header('Content-Type', 'application/xml; charset=utf-8')
            ->header('X-Robots-Tag', 'noindex');
    }

    /**
     * Generate sitemap XML string with custom or default base URL
     */
    public function generateXml(?string $baseUrl = null): string
    {
        $urls = $this->collectAllUrls($baseUrl);
        return view('sitemap.index', compact('urls'))->render();
    }

    /**
     * Collect and deduplicate all website URLs
     */
    public function collectAllUrls(?string $baseUrl = null): array
    {
        if (!$baseUrl) {
            $raw = config('app.url', 'https://tcsmarttechnology.com');
            $baseUrl = rtrim(preg_replace('/\/public$/', '', $raw), '/');
        } else {
            $baseUrl = rtrim($baseUrl, '/');
        }

        $sitemap = [];

        $add = function (string $path, string $priority = '0.8', string $changefreq = 'weekly', $lastmod = null) use (&$sitemap, $baseUrl) {
            $path = '/' . ltrim($path, '/');
            $loc = $baseUrl . $path;
            
            // Format lastmod
            if ($lastmod instanceof \DateTimeInterface) {
                $lastmodStr = $lastmod->format('Y-m-d\TH:i:sP');
            } elseif (is_string($lastmod) && !empty($lastmod)) {
                $lastmodStr = date('Y-m-d\TH:i:sP', strtotime($lastmod));
            } else {
                $lastmodStr = now()->format('Y-m-d\TH:i:sP');
            }

            $sitemap[$loc] = [
                'loc' => $loc,
                'lastmod' => $lastmodStr,
                'changefreq' => $changefreq,
                'priority' => $priority,
            ];
        };

        // 1. Core Pages
        $add('/', '1.0', 'daily');
        $add('/about-us', '0.85', 'monthly');
        $add('/services', '0.90', 'weekly');
        $add('/products', '0.90', 'daily');
        $add('/blogs', '0.85', 'daily');
        $add('/case-studies', '0.80', 'monthly');
        $add('/contact', '0.80', 'monthly');
        $add('/appointment', '0.75', 'monthly');
        $add('/sitemap', '0.60', 'monthly');
        $add('/privacy-policy', '0.40', 'yearly');
        $add('/terms-and-conditions', '0.40', 'yearly');
        $add('/return-policy', '0.40', 'yearly');
        $add('/accessibility-statement', '0.40', 'yearly');

        // 2. Main Service Categories & Landing Pages
        $add('/services/embedded-systems-solutions', '0.90', 'weekly');
        $add('/services/industrial-automation', '0.90', 'weekly');
        $add('/services/industrial-standard-machine', '0.90', 'weekly');
        $add('/services/hvac-solutions', '0.90', 'weekly');
        $add('/services/software-development', '0.90', 'weekly');
        $add('/services/software', '0.90', 'weekly');

        // 3. Embedded Systems Specialized Services
        $embeddedRoutes = [
            'embedded/hw-firmware' => ['0.85', 'weekly'],
            'embedded/pcb-power' => ['0.85', 'weekly'],
            'embedded/security' => ['0.85', 'weekly'],
            'embedded/iot-cloud' => ['0.85', 'weekly'],
            'embedded/medical-rd' => ['0.85', 'weekly'],
            'embedded/testing' => ['0.85', 'weekly'],
            'embedded-software/ux-ui-development-new' => ['0.80', 'monthly'],
            'embedded-software/iotdevice-integration-new' => ['0.80', 'monthly'],
            'embedded-software/mental-device-development-new' => ['0.80', 'monthly'],
            'embedded-software/automated-testing-development-new' => ['0.80', 'monthly'],
            'embedded-hardware/circuit-designing' => ['0.80', 'monthly'],
            'embedded-hardware/pcb-designing' => ['0.80', 'monthly'],
            'embedded-hardware/mounting-pcb' => ['0.80', 'monthly'],
            'biomedical/orthopaedic-heat-pad' => ['0.75', 'monthly'],
            'biomedical/electric-body-massager' => ['0.75', 'monthly'],
        ];
        foreach ($embeddedRoutes as $sub => $meta) {
            $add('/services/' . $sub, $meta[0], $meta[1]);
        }

        // 4. Industrial Automation & Hardware Services
        $industrialAutomationRoutes = [
            'embedded-hardware/plc-scada-hmi-programming' => ['0.85', 'weekly'],
            'embedded-hardware/robotics-integration' => ['0.85', 'weekly'],
            'embedded-hardware/machine-vision' => ['0.85', 'weekly'],
            'embedded-hardware/motion-control' => ['0.85', 'weekly'],
            'embedded-hardware/iiot-industry4' => ['0.85', 'weekly'],
            'embedded-hardware/switchgear-panel-design' => ['0.85', 'weekly'],
            'embedded-hardware/high-voltage-testing' => ['0.85', 'weekly'],
            'embedded-hardware/test-bench-design' => ['0.85', 'weekly'],
        ];
        foreach ($industrialAutomationRoutes as $sub => $meta) {
            $add('/services/' . $sub, $meta[0], $meta[1]);
        }

        // 5. Industrial Standard Machine Services
        $machineRoutes = [
            'industrial-standard-machine/cnc-vmc-machining-centers',
            'industrial-standard-machine/injection-molding-plastic-processing',
            'industrial-standard-machine/laser-cutting-engraving-marking',
            'industrial-standard-machine/robotic-welding-automation-cells',
            'industrial-standard-machine/hydraulic-servo-power-press',
            'industrial-standard-machine/lathe-turning-machines',
            'industrial-standard-machine/smart-packaging-labeling',
            'industrial-standard-machine/sheet-metal-bending-shearing',
            'industrial-standard-machine/battery-ev-energy-sector',
        ];
        foreach ($machineRoutes as $sub) {
            $add('/services/' . $sub, '0.85', 'weekly');
        }

        // 6. HVAC Solutions Services
        $hvacRoutes = [
            'hvac/installation',
            'hvac/maintenance',
            'hvac/repair',
            'hvac/heating-cooling',
            'hvac/ventilation',
            'hvac/energy',
            'hvac/centralized-hvac',
            'hvac/split-ac',
            'hvac/smart-climate',
            'hvac/iaq-enhancement',
            'hvac/system-optimization',
        ];
        foreach ($hvacRoutes as $sub) {
            $add('/services/' . $sub, '0.85', 'weekly');
        }

        // 7. Software Development Services
        $softwareRoutes = [
            'software/ai-machinelearning-solutions',
            'software/smart-automation',
            'software/blockchain-platforms',
            'software/mobile-application-development',
            'software/domain-based-solutions',
            'software/manpower-providing-services',
            'software/custom-erp-development',
            'software/mlm-network-software',
        ];
        foreach ($softwareRoutes as $sub) {
            $add('/services/' . $sub, '0.85', 'weekly');
        }

        // 8. ServiceCatalog Categories & Services
        if (class_exists(ServiceCatalog::class)) {
            foreach (ServiceCatalog::getCategories() as $catSlug => $category) {
                $add('/services/' . $catSlug, '0.90', 'weekly');
            }

            foreach (ServiceCatalog::getServices() as $servSlug => $service) {
                $cat = $service['category_slug'] ?? '';
                if ($cat) {
                    $add('/services/' . $cat . '/' . $servSlug, '0.85', 'weekly');
                }
            }
        }

        // 9. Product Categories & Models
        try {
            $categories = Category::with('productModels')->get();
            foreach ($categories as $cat) {
                if ($cat->slug) {
                    $add('/products/' . $cat->slug, '0.85', 'daily', $cat->updated_at);

                    if ($cat->productModels) {
                        foreach ($cat->productModels as $model) {
                            if ($model->slug) {
                                $add('/products/' . $cat->slug . '/' . $model->slug, '0.80', 'daily', $model->updated_at);
                            }
                        }
                    }
                }
            }
        } catch (\Throwable $e) {
            // Skip gracefully if tables are uninitialized
        }

        // 10. Active Products
        try {
            $products = Product::where('is_active', 1)->get();
            foreach ($products as $prod) {
                if ($prod->slug) {
                    $add('/product/' . $prod->slug, '0.85', 'weekly', $prod->updated_at);
                }
            }
        } catch (\Throwable $e) {
            // Skip gracefully
        }

        // 11. Active Blog Posts
        try {
            $blogs = Blog::where('status', 1)->get();
            foreach ($blogs as $blog) {
                if ($blog->slug) {
                    $add('/blog/' . $blog->slug, '0.80', 'weekly', $blog->updated_at);
                }
            }
        } catch (\Throwable $e) {
            // Skip gracefully
        }

        return array_values($sitemap);
    }
}
