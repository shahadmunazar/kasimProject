<?php

use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

// Static Pages
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/about-us', [HomeController::class, 'about_us'])->name('about_us.index');
Route::get('/services', [HomeController::class, 'services'])->name('services.index');
Route::get('/products', [HomeController::class, 'products_listing'])->name('products.listing');
Route::get('/product/{slug}', [HomeController::class, 'product_details'])->name('product.details');
Route::post('/product/{id}/like', [HomeController::class, 'like_product'])->name('product.like');
Route::post('/product/{id}/review', [HomeController::class, 'store_review'])->name('product.review');
Route::get('/products/{category_slug}', [HomeController::class, 'products_by_category'])->name('products.category');
Route::get('/products/{category_slug}/{model_slug}', [HomeController::class, 'products_by_model'])->name('products.model');
Route::post('/products/inquiry', [HomeController::class, 'store_inquiry'])->name('products.inquiry');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact.index');
Route::get('/blogs', [HomeController::class, 'blogs'])->name('blogs.index');
Route::get('/blog/{slug}', [HomeController::class, 'blog_details'])->name('blogs.details');
Route::get('/get-current',[HomeController::class,'get_current']);
Route::post('/save-location', [HomeController::class, 'store'])->name('saved.location');
Route::post('/contact-submit', [HomeController::class, 'save_contact'])->name('contact.submit');
Route::get('/sitemap.xml', [App\Http\Controllers\SitemapController::class, 'index']);
Route::post('/save-location', [HomeController::class, 'save_purpose_location'])->name('saved.location');

Route::get('/sameer-roozy', [HomeController::class, 'sameer_day'])->name('sameer');

Route::get('/purpose-day', [HomeController::class, 'purpose_day'])->name('purpose_day');

// Products
Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

Route::prefix('products')->group(function () {
    // TC IOT Product
    Route::get('iot/customized-gas-detector', [HomeController::class, 'iot_customized_gas_detector'])->name('products.iot.customized_gas_detector');

    // TC Smart Solution
    Route::get('smart-solution/smart-watch', [HomeController::class, 'smart_watch'])->name('products.smart_solution.smart_watch');
    Route::get('smart-solution/datchik-game', [HomeController::class, 'datchik_game'])->name('products.smart_solution.datchik_game');

    // TC Biomedical Product
    Route::get('biomedical/orthopaedic-heat-pad', [HomeController::class, 'orthopaedic_heat_pad'])->name('products.biomedical.orthopaedic_heat_pad');
    Route::get('biomedical/electric-body-massager', [HomeController::class, 'electric_body_massager'])->name('products.biomedical.electric_body_massager');

    // TC Lighting Product (commented out)
    // Route::get('lighting/led-light', [HomeController::class, 'led_light'])->name('products.lighting.led_light');
    // Route::get('lighting/concealed-light', [HomeController::class, 'concealed_light'])->name('products.lighting.concealed_light');
    // Route::get('lighting/tube-light', [HomeController::class, 'tube_light'])->name('products.lighting.tube_light');
    // Route::get('lighting/panel-light', [HomeController::class, 'panel_light'])->name('products.lighting.panel_light');
});

// Services
Route::prefix('services')->group(function () {

    // Embedded Systems Sub-Routes (with short clean names)
    Route::get('/embedded-systems-solutions', [HomeController::class, 'embeddedSystems'])->name('services.embedded_systems');
    Route::get('embedded/hw-firmware', [HomeController::class, 'hwFirmware'])->name('services.embedded.hw_firmware');
    Route::get('embedded/pcb-power', [HomeController::class, 'pcbPower'])->name('services.embedded.pcb_power');
    Route::get('embedded/security', [HomeController::class, 'circuitSecurity'])->name('services.embedded.security');
    Route::get('embedded/iot-cloud', [HomeController::class, 'iotCloud'])->name('services.embedded.iot_cloud');
    Route::get('embedded/medical-rd', [HomeController::class, 'medicalRD'])->name('services.embedded.medical_rd');
    Route::get('embedded/testing', [HomeController::class, 'testingFrameworks'])->name('services.embedded.testing');

    // Embedded Software Development Services
    Route::get('embedded-software/ux-ui-development-new', [HomeController::class, 'ux_ui_development_new'])->name('services.embedded_software.ux_ui_development_new');
    Route::get('embedded-software/iotdevice-integration-new', [HomeController::class, 'iotdevice_integration_new'])->name('services.embedded_software.iotdevice_integration_new');
    Route::get('embedded-software/mental-device-development-new', [HomeController::class, 'mental_device_development_new'])->name('services.embedded_software.mental_device_development_new');
    Route::get('embedded-software/automated-testing-development-new', [HomeController::class, 'automated_testing_development_new'])->name('services.embedded_software.automated_testing_development_new');

    // Top-level service category routes
    Route::get('/services/industrial-standard-machine', [HomeController::class, 'integrationSystems'])->name('services.integration_systems');
    Route::get('/industrial-automation', [HomeController::class, 'industrialAutomation'])->name('services.industrial_automation');
    Route::get('/software-development', [HomeController::class, 'softwareDevelopment'])->name('services.software_development');
    Route::get('/hvac-solutions', [HomeController::class, 'hvacSolutions'])->name('services.hvac_solutions');



    // Industrial Automation, Robotics & Switchgear Testing Services
    Route::get('embedded-hardware/plc-scada-hmi-programming', [HomeController::class, 'plcScadaHmiProgramming'])->name('services.embedded_hardware.plc_scada_hmi_programming');
    Route::get('embedded-hardware/robotics-integration', [HomeController::class, 'roboticsIntegration'])->name('services.embedded_hardware.robotics_integration');
    Route::get('embedded-hardware/machine-vision', [HomeController::class, 'machineVision'])->name('services.embedded_hardware.machine_vision');
    Route::get('embedded-hardware/motion-control', [HomeController::class, 'motionControl'])->name('services.embedded_hardware.motion_control');
    Route::get('embedded-hardware/iiot-industry4', [HomeController::class, 'iiotIndustry4'])->name('services.embedded_hardware.iiot_industry4');
    Route::get('embedded-hardware/switchgear-panel-design', [HomeController::class, 'switchgearPanelDesign'])->name('services.embedded_hardware.switchgear_panel_design');
    Route::get('embedded-hardware/high-voltage-testing', [HomeController::class, 'highVoltageTesting'])->name('services.embedded_hardware.high_voltage_testing');
    Route::get('embedded-hardware/test-bench-design', [HomeController::class, 'testBenchDesign'])->name('services.embedded_hardware.test_bench_design');

  //industrial standard machine_vision



Route::prefix('industrial-standard-machine')->group(function () {
    Route::get('/', [HomeController::class, 'industrialStandardMachine'])->name('services.industrial_standard_machine');
    Route::get('cnc-vmc-machining-centers', [HomeController::class, 'cncVmc'])->name('services.industrial.cnc_vmc');
    Route::get('injection-molding-plastic-processing', [HomeController::class, 'injectionMolding'])->name('services.industrial.injection_molding');
    Route::get('laser-cutting-engraving-marking', [HomeController::class, 'laserCutting'])->name('services.industrial.laser_cutting');
    Route::get('robotic-welding-automation-cells', [HomeController::class, 'roboticWelding'])->name('services.industrial.robotic_welding');
    Route::get('hydraulic-servo-power-press', [HomeController::class, 'hydraulicServoPress'])->name('services.industrial.hydraulic_servo_press');
    Route::get('lathe-turning-machines', [HomeController::class, 'latheTurning'])->name('services.industrial.lathe_turning');
    Route::get('smart-packaging-labeling', [HomeController::class, 'smartPackaging'])->name('services.industrial.smart_packaging');
    Route::get('sheet-metal-bending-shearing', [HomeController::class, 'sheetMetal'])->name('services.industrial.sheet_metal');
    Route::get('battery-ev-energy-sector', [HomeController::class, 'batteryEv'])->name('services.industrial.battery_ev');
});



    // Embedded Hardware Development Services
    Route::get('embedded-hardware/circuit-designing', [HomeController::class, 'circuit_designing'])->name('services.embedded_hardware.circuit_designing');
    Route::get('embedded-hardware/pcb-designing', [HomeController::class, 'pcb_designing'])->name('services.embedded_hardware.pcb_designing');
    Route::get('embedded-hardware/mounting-pcb', [HomeController::class, 'mounting_pcb'])->name('services.embedded_hardware.mounting_pcb');

    // Datchik Biomedical Services
    Route::get('biomedical/orthopaedic-heat-pad', [HomeController::class, 'biomedical_orthopaedic_heat_pad'])->name('services.biomedical.orthopaedic_heat_pad');
    Route::get('biomedical/electric-body-massager', [HomeController::class, 'biomedical_electric_body_massager'])->name('services.biomedical.electric_body_massager');

    // Datchik Lighting Services
    Route::prefix('hvac')->group(function () {
        Route::get('/centralized-hvac', [HomeController::class, 'centralized_hvac'])->name('services.hvac.centralized_hvac');
        Route::get('/split-ac', [HomeController::class, 'split_ac'])->name('services.hvac.split_ac');
        Route::get('/smart-climate', [HomeController::class, 'smart_climate'])->name('services.hvac.smart_climate');
        Route::get('/iaq-enhancement', [HomeController::class, 'iaq_enhancement'])->name('services.hvac.iaq_enhancement');
        Route::get('/system-optimization', [HomeController::class, 'system_optimization'])->name('services.hvac.system_optimization');
        Route::get('/installation', [HomeController::class, 'installation'])->name('services.hvac.installation');
        Route::get('/maintenance', [HomeController::class, 'maintenance'])->name('services.hvac.maintenance');
        Route::get('/repair', [HomeController::class, 'repair'])->name('services.hvac.repair');
        Route::get('/heating-cooling', [HomeController::class, 'heatingCooling'])->name('services.hvac.heating_cooling');
        Route::get('/ventilation', [HomeController::class, 'ventilation'])->name('services.hvac.ventilation');
        Route::get('/energy', [HomeController::class, 'energy'])->name('services.hvac.energy');
        });

    Route::prefix('software')->group(function () {
        Route::get('/', [HomeController::class, 'software'])->name('services.software');
        Route::get('ai-machinelearning-solutions', [HomeController::class, 'aiMachineLearningSolutions'])->name('services.software.ai_machinelearning_solutions');
        Route::get('smart-automation', [HomeController::class, 'smartAutomation'])->name('services.software.smart_automation');
        Route::get('blockchain-platforms', [HomeController::class, 'blockchainPlatforms'])->name('services.software.blockchain_platforms');
        Route::get('mobile-application-development', [HomeController::class, 'mobileApplicationDevelopment'])->name('services.software.mobile_application_development');
        Route::get('domain-based-solutions', [HomeController::class, 'domainBasedSolutions'])->name('services.software.domain_based_solutions');
        Route::get('manpower-providing-services', [HomeController::class, 'manpowerProvidingServices'])->name('services.software.manpower_providing_services');
        Route::get('custom-erp-development', [HomeController::class, 'customErpDevelopment'])->name('services.software.custom_erp_development');
        Route::get('mlm-network-software', [HomeController::class, 'mlmNetworkSoftware'])->name('services.software.mlm_network_software');
    });
    
    
    
    });
    
    // 404 & Appointments
    Route::get('/404', function () {
        return view('errors.404');
    })->name('404');
    
    Route::get('/appointment', [HomeController::class, 'appointment'])->name('appointment.index');
    Route::post('/appointment', [HomeController::class, 'store'])->name('appointment.store');

// Frontend Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [\App\Http\Controllers\Frontend\AuthController::class, 'showLogin'])->name('frontend.auth.login');
    Route::get('/register', [\App\Http\Controllers\Frontend\AuthController::class, 'showLogin'])->name('frontend.auth.register-view');
    Route::post('/login/password', [\App\Http\Controllers\Frontend\AuthController::class, 'loginWithPassword'])->name('frontend.auth.login-password');
    Route::post('/register', [\App\Http\Controllers\Frontend\AuthController::class, 'register'])->name('frontend.auth.register');
    Route::post('/login/otp/send', [\App\Http\Controllers\Frontend\AuthController::class, 'sendOtp'])->name('frontend.auth.send-otp');
    Route::post('/login/verify', [\App\Http\Controllers\Frontend\AuthController::class, 'verifyOtp'])->name('frontend.auth.verify-otp');
});

Route::post('/logout', [\App\Http\Controllers\Frontend\AuthController::class, 'logout'])->name('frontend.auth.logout');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Frontend\DashboardController::class, 'profile'])->name('frontend.dashboard.profile');
    Route::post('/dashboard/profile', [\App\Http\Controllers\Frontend\DashboardController::class, 'updateProfile'])->name('frontend.dashboard.profile.update');
    Route::get('/dashboard/orders', [\App\Http\Controllers\Frontend\DashboardController::class, 'orders'])->name('frontend.dashboard.orders');
    Route::get('/dashboard/orders/{id}', [\App\Http\Controllers\Frontend\DashboardController::class, 'showOrder'])->name('frontend.dashboard.order.show');
    Route::get('/dashboard/addresses', [\App\Http\Controllers\Frontend\DashboardController::class, 'addresses'])->name('frontend.dashboard.addresses');
    Route::post('/dashboard/addresses', [\App\Http\Controllers\Frontend\DashboardController::class, 'storeAddress'])->name('frontend.dashboard.addresses.store');
    Route::post('/dashboard/addresses/{id}', [\App\Http\Controllers\Frontend\DashboardController::class, 'updateAddress'])->name('frontend.dashboard.addresses.update');
    Route::delete('/dashboard/addresses/{id}', [\App\Http\Controllers\Frontend\DashboardController::class, 'deleteAddress'])->name('frontend.dashboard.addresses.delete');

    // Checkout Routes
    Route::get('/checkout/{product_id}', [\App\Http\Controllers\Frontend\CheckoutController::class, 'index'])->name('frontend.checkout');
    Route::post('/checkout/{product_id}', [\App\Http\Controllers\Frontend\CheckoutController::class, 'process'])->name('frontend.checkout.process');
});

// Admin Routes
use App\Http\Controllers\Admin\AdminController;

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'authenticate'])->name('admin.authenticate');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::resource('blogs', App\Http\Controllers\Admin\BlogController::class)->names('admin.blogs');
        Route::resource('contacts', App\Http\Controllers\Admin\ContactController::class)->only(['index', 'destroy'])->names('admin.contacts');
        Route::get('/visitors', [App\Http\Controllers\Admin\VisitorController::class, 'index'])->name('admin.visitors.index');
        Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class)->names('admin.categories');
        Route::resource('product_models', \App\Http\Controllers\Admin\ProductModelController::class)->names('admin.product_models');
        Route::resource('products', \App\Http\Controllers\Admin\ProductController::class)->names('admin.products');
        Route::get('get-models-by-category/{category_id}', [\App\Http\Controllers\Admin\ProductController::class, 'getModelsByCategory'])->name('admin.get-models-by-category');
        Route::get('product_inquiries', [\App\Http\Controllers\Admin\ProductInquiryController::class, 'index'])->name('admin.product_inquiries.index');
        
        Route::get('product_reviews', [\App\Http\Controllers\Admin\ProductReviewController::class, 'index'])->name('admin.product_reviews.index');
        Route::post('product_reviews/{id}/toggle-status', [\App\Http\Controllers\Admin\ProductReviewController::class, 'toggle_status']);
        Route::delete('product_reviews/{id}', [\App\Http\Controllers\Admin\ProductReviewController::class, 'destroy']);
    });
});

// Payment and Orders Admin Routes
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/settings', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('admin.settings.index');
    Route::post('/settings/qr-code', [App\Http\Controllers\Admin\SettingController::class, 'updateQrCode'])->name('admin.settings.qr_code');
    
    Route::resource('orders', App\Http\Controllers\Admin\OrderController::class)->names('admin.orders');
});

// Checkout Routes
Route::get('/checkout/{product}', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/{product}', [App\Http\Controllers\CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/checkout/success/{order}', [App\Http\Controllers\CheckoutController::class, 'success'])->name('checkout.success');
