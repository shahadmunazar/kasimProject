<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Http\Controllers\Controller;
use PDO;
use App\Models\PurposeDayLocation;

class HomeController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'latitude' => 'required',
            'longitude' => 'required',
            'address' => 'required'
        ]);

        $location = Location::create([
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'address' => $request->address
        ]);

        return response()->json(['success' => true, 'location' => $location]);
    }

    public function save_contact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'mobile' => 'required|string|max:20',
            'service_type' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        \App\Models\Contact::create($validated);

        return response()->json(['success' => true, 'message' => 'Your message has been sent successfully!']);
    }


    public function hwFirmware() {
    return view('services.embedded.hw_firmware');
}

public function pcbPower() {
    return view('services.embedded.pcb_power');
}

public function circuitSecurity() {
    return view('services.embedded.circuit_security');
}

public function iotCloud() {
    return view('services.embedded.iot_cloud');
}

public function medicalRD() {
    return view('services.embedded.medical_rd');
}
   public function industrialStandardMachine()
    {
        return view('services.industrial');
    }

    // Subcategories
    public function cncVmc()
    {
        return view('services.industrial.cnc_vmc');
    }

    
    public function injectionMolding()
    {
        return view('services.industrial.injection_molding');
    }

    public function laserCutting()
    {
        return view('services.industrial.laser_cutting');
    }

    public function roboticWelding()
    {
        return view('services.industrial.robotic_welding');
    }

    public function hydraulicServoPress()
    {
        return view('services.industrial.hydraulic_servo_press');
    }

    public function latheTurning()
    {
        return view('services.industrial.lathe_turning');
    }


public function sameer_day()
    {
        return view('frontend.sameer_day');
    }
    
    public function smartPackaging()
    {
        return view('services.industrial.smart_packaging');
    }

    public function sheetMetal()
    {
        return view('services.industrial.sheet_metal');
    }

    public function batteryEv()
    {
        return view('services.industrial.battery_ev');
    }







public function automatedAssemblyLines() {
    return view('services.integration.assembly_lines');
}



public function plcHmiSolutions() {
    return view('services.integration.plc_solutions');
}

public function qualityInspectionSystems() {
    return view('services.integration.quality_systems');
}

public function machineMonitoringAnalytics() {
    return view('services.integration.machine_monitoring');
}


public function testingFrameworks() {
    return view('services.embedded.testing');
}


    public function index()
    {
        return view('frontend.home.index');
    }

    public function products_listing()
    {
        $categories = \App\Models\Category::with('products')->where('is_active', true)->get();
        return view('frontend.products.index', compact('categories'));
    }

    public function products_by_category($category_slug)
    {
        $category = \App\Models\Category::with(['products' => function($q) { $q->where('is_active', true); }])->where('slug', $category_slug)->where('is_active', true)->firstOrFail();
        $categories = collect([$category]);
        return view('frontend.products.index', compact('categories'));
    }

    public function products_by_model($category_slug, $model_slug)
    {
        $category = \App\Models\Category::where('slug', $category_slug)->where('is_active', true)->firstOrFail();
        $model = \App\Models\ProductModel::with(['products' => function($q) { $q->where('is_active', true); }])->where('slug', $model_slug)->where('is_active', true)->firstOrFail();
        
        $category->setRelation('products', $model->products);
        $categories = collect([$category]);
        return view('frontend.products.index', compact('categories'));
    }

    public function product_details($slug)
    {
        $product = \App\Models\Product::with(['category', 'productModel', 'reviews' => function($q) {
            $q->where('is_approved', true)->latest();
        }])->where('slug', $slug)->where('is_active', true)->firstOrFail();
        
        $hasLiked = session()->has('liked_product_' . $product->id);
        
        return view('frontend.products.show', compact('product', 'hasLiked'));
    }

    public function like_product(Request $request, $id)
    {
        $product = \App\Models\Product::findOrFail($id);
        $sessionKey = 'liked_product_' . $product->id;
        $ip = $request->ip();
        $cacheKey = 'liked_product_' . $product->id . '_ip_' . $ip;

        if (session()->has($sessionKey) || \Illuminate\Support\Facades\Cache::has($cacheKey)) {
            // Unlike
            if ($product->likes > 0) $product->decrement('likes');
            session()->forget($sessionKey);
            \Illuminate\Support\Facades\Cache::forget($cacheKey);
            $hasLiked = false;
        } else {
            // Like
            $product->increment('likes');
            session()->put($sessionKey, true);
            // Store IP in cache for 1 year (to simulate strict IP blocking)
            \Illuminate\Support\Facades\Cache::put($cacheKey, true, now()->addYear());
            $hasLiked = true;
        }
        
        return response()->json(['success' => true, 'likes' => $product->likes, 'hasLiked' => $hasLiked]);
    }

    public function store_review(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string'
        ]);

        $ip = $request->ip();
        $sessionId = session()->getId();

        $existingReview = \App\Models\ProductReview::where('product_id', $id)
            ->where(function($query) use ($ip, $sessionId) {
                $query->where('ip_address', $ip)
                      ->orWhere('session_id', $sessionId);
            })->first();

        if ($existingReview) {
            return response()->json(['success' => false, 'message' => 'You have already submitted a review for this product.'], 403);
        }

        \App\Models\ProductReview::create([
            'product_id' => $id,
            'name' => $request->name,
            'email' => $request->email,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'is_approved' => true, // Auto approve for now
            'ip_address' => $ip,
            'session_id' => $sessionId
        ]);

        return response()->json(['success' => true, 'message' => 'Review submitted successfully!']);
    }

    public function store_inquiry(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'name' => 'required',
            'phone' => 'required',
        ]);
        \App\Models\ProductInquiry::create($request->all());
        return back()->with('success', 'Inquiry sent successfully!');
    }

  

    public function installation()
    {
        return view('services.hvac.installation');
    }

    public function maintenance()
    {
        return view('services.hvac.maintenance');
    }

    public function repair()
    {
        return view('services.hvac.repair');
    }

    public function heatingCooling()
    {
        return view('services.hvac.heating_cooling');
    }

    public function ventilation()
    {
        return view('services.hvac.ventilation');
    }

    public function energy()
    {
        return view('services.hvac.energy');
    }

 public function embeddedSystems() {
        return view('services.embedded_systems');
    }


    public function about_us()
    {
        return view('frontend.home.aboutus');
    }
    public function services()
    {
        return view('frontend.home.services');
    }
    public function features()
    {
        return view('frontend.home.features');
    }
    public function teams()
    {
        return view('frontend.home.teams');
    }
    public function testimonials()
    {
        return view('frontend.home.testimonials');
    }
    public function appointment()
    {
        return view('frontend.home.appointment');
    }
    public function contact()
    {
        return view('frontend.home.contact');
    }

    public function blogs(Request $request)
    {
        $blogs = \App\Models\Blog::latest()->paginate(6);
        
        if ($request->ajax()) {
            $view = view('frontend.blogs.blog_items', compact('blogs'))->render();
            return response()->json(['html' => $view, 'next_page_url' => $blogs->nextPageUrl()]);
        }

        return view('frontend.blogs.index', compact('blogs'));
    }

    public function blog_details($slug)
    {
        $blog = \App\Models\Blog::where('slug', $slug)->firstOrFail();
        $blog->increment('views'); // Increment views
        
        // Fetch recent blogs for sidebar
        $recentBlogs = \App\Models\Blog::latest()->limit(5)->get();
        return view('frontend.blogs.show', compact('blog', 'recentBlogs'));
    }

    // Products Methods
    public function iot_customized_gas_detector()
    {
        return view('products.iot.customized_gas_detector');
    }

    public function smart_watch()
    {
        return view('products.smart_solution.smart_watch');
    }

    public function datchik_game()
    {
        return view('products.smart_solution.datchik_game');
    }

    public function orthopaedic_heat_pad()
    {
        return view('products.biomedical.orthopaedic_heat_pad');
    }

    public function electric_body_massager()
    {
        return view('products.biomedical.electric_body_massager');
    }

    // public function led_light()
    // {
    //     return view('products.lighting.led_light');
    // }

    // public function concealed_light()
    // {
    //     return view('products.lighting.concealed_light');
    // }

    // public function tube_light()
    // {
    //     return view('products.lighting.tube_light');
    // }

    // public function panel_light()
    // {
    //     return view('products.lighting.panel_light');
    // }

    // Services Methods
    public function firmware_development()
    {
        return view('services.embedded_software.firmware_development');
    }

    public function linux_driver_development()
    {
        return view('services.embedded_software.linux_driver_development');
    }

    public function ux_ui_development()
    {
        return view('services.embedded_software.ux_ui_development');
    }

    public function circuit_designing()
    {
        return view('services.embedded_hardware.circuit_designing');
    }

    public function pcb_designing()
    {
        return view('services.embedded_hardware.pcb_designing');
    }

    public function mounting_pcb()
    {
        return view('services.embedded_hardware.mounting_pcb');
    }

    public function biomedical_orthopaedic_heat_pad()
    {
        return view('services.biomedical.orthopaedic_heat_pad');
    }

    public function biomedical_electric_body_massager()
    {
        return view('services.biomedical.electric_body_massager');
    }

    public function lighting_led_light()
    {
        return view('services.lighting.led_light');
    }

    public function lighting_concealed_light()
    {
        return view('services.lighting.concealed_light');
    }

    public function lighting_tube_light()
    {
        return view('services.lighting.tube_light');
    }

    public function hvac_solutions()
    {
        return view('services.hvac_solutions.index');
    }




   
    public function industrialAutomation()
    {
        return view('services.industrial_automation');
    }

    public function softwareDevelopment()
    {
        return view('services.software_development');
    }

    public function hvacSolutions()
    {
        return view('services.hvac_solutions');
    }

    public function software()
    {
        return view('services.software');
    }

    public function aiMachineLearningSolutions()
    {
        return view('services.software.ai-machinelearning-solutions');
    }

    public function smartAutomation()
    {
        return view('services.software.smart-automation');
    }

    public function blockchainPlatforms()
    {
        return view('services.software.blockchain-platforms');
    }

    public function mobileApplicationDevelopment()
    {
        return view('services.software.mobile-application-development');
    }

    public function domainBasedSolutions()
    {
        return view('services.software.domain-based-solutions');
    }

    public function manpowerProvidingServices()
    {
        return view('services.software.manpower-providing-services');
    }

    public function customErpDevelopment()
    {
        return view('services.software.custom-erp-development');
    }

    public function mlmNetworkSoftware()
    {
        return view('services.software.mlm-network-software');
    }


    //Second Number Function software_development

    public function plcScadaHmiProgramming()
    {
        return view('services.embedded_hardware.plc_scada_hmi_programming');
    }

    public function roboticsIntegration()
    {
        return view('services.embedded_hardware.robotics_integration');
    }

    public function machineVision()
    {
        return view('services.embedded_hardware.machine_vision');
    }

    public function motionControl()
    {
        return view('services.embedded_hardware.motion_control');
    }

    public function iiotIndustry4()
    {
        return view('services.embedded_hardware.iiot_industry4');
    }

    public function switchgearPanelDesign()
    {
        return view('services.embedded_hardware.switchgear_panel_design');
    }

    public function highVoltageTesting()
    {
        return view('services.embedded_hardware.high_voltage_testing');
    }

    public function testBenchDesign()
    {
        return view('services.embedded_hardware.test_bench_design');
    }
    
    
    public function get_current(){
        return view('getlocation');
    }
    
    public function purpose_day()
    {
        return view('frontend.purpose_day');
    }
    
    
    public function save_purpose_location(Request $request)
    {
        $request->validate([
            'latitude' => 'required',
            'longitude' => 'required',
            'address' => 'required'
        ]);

        $location = PurposeDayLocation::create([
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'address' => $request->address
        ]);

        return response()->json(['success' => true, 'location' => $location]);
    }
    
    //end here

}
