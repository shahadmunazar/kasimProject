<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\WishlistController;
use Illuminate\Support\Facades\Route;

// Cart Routes
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::get('/mini', [CartController::class, 'miniCart'])->name('cart.mini');
    Route::post('/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/update', [CartController::class, 'update'])->name('cart.update');
    Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/count', [CartController::class, 'count'])->name('cart.count');
});

// Wishlist Routes
Route::prefix('wishlist')->group(function () {
    Route::get('/', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/toggle', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
    Route::get('/count', [WishlistController::class, 'count'])->name('wishlist.count');
});

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
Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact_us.index');
Route::get('/case-studies', [HomeController::class, 'caseStudies'])->name('case_studies.index');
Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy'])->name('privacy.policy');
Route::get('/terms-and-conditions', [HomeController::class, 'termsConditions'])->name('terms.conditions');
Route::get('/accessibility-statement', [HomeController::class, 'accessibilityStatement'])->name('accessibility.statement');
Route::get('/sitemap', [HomeController::class, 'sitemap'])->name('sitemap.index');
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

// Services Architecture (V5 Specification)
Route::prefix('services')->group(function () {
    // 4 Parent Categories
    Route::get('/embedded-design-development', [HomeController::class, 'embeddedDesignDevelopment'])->name('services.embedded_design_development');
    Route::get('/industrial-iot-solutions', [HomeController::class, 'industrialIotSolutions'])->name('services.industrial_iot_solutions');
    Route::get('/industrial-automation', [HomeController::class, 'industrialAutomationServices'])->name('services.industrial_automation_services');
    Route::get('/ai-solutions-custom-ai-agents', [HomeController::class, 'aiSolutionsCustomAiAgents'])->name('services.ai_solutions_custom_ai_agents');

    // 301 Permanent Redirects and Named Route Aliases (Brief V5 Section 18)
    Route::get('/embedded-systems-solutions', fn() => redirect('/services/embedded-design-development', 301))->name('services.embedded_systems');
    Route::get('/industrial-iot', fn() => redirect('/services/industrial-iot-solutions', 301))->name('services.industrial_iot');
    Route::get('/industrial-automation-nav', fn() => redirect('/services/industrial-automation', 301))->name('services.industrial_automation');
    Route::get('/custom-ai-agents', fn() => redirect('/services/ai-solutions-custom-ai-agents', 301))->name('services.custom_ai_agents');
    Route::get('/hvac-solutions', fn() => redirect('/services/industrial-iot-solutions', 301))->name('services.hvac_solutions');
    Route::get('/software-development', fn() => redirect('/services/ai-solutions-custom-ai-agents', 301))->name('services.software_development');
    Route::get('/industrial-standard-machine-nav', fn() => redirect('/services/industrial-automation', 301))->name('services.integration_systems');

    // Sub-Category Group Aliases / Anchors
    Route::get('/embedded-design-development/hardware-pcb', fn() => redirect('/services/embedded-design-development#sub-hardware-pcb', 301));
    Route::get('/embedded-design-development/software-platforms', fn() => redirect('/services/embedded-design-development#sub-software-platforms', 301));
    Route::get('/embedded-design-development/iot-interfaces', fn() => redirect('/services/embedded-design-development#sub-iot-interfaces', 301));
    Route::get('/embedded-design-development/product-lifecycle', fn() => redirect('/services/embedded-design-development#sub-product-lifecycle', 301));
    Route::get('/industrial-iot-solutions/data-monitoring', fn() => redirect('/services/industrial-iot-solutions#sub-data-monitoring', 301));
    Route::get('/industrial-iot-solutions/smart-manufacturing-oee', fn() => redirect('/services/industrial-iot-solutions#sub-smart-manufacturing-oee', 301));
    Route::get('/industrial-iot-solutions/machine-iiot', fn() => redirect('/services/industrial-iot-solutions#sub-machine-iiot', 301));
    Route::get('/industrial-automation/control-robotics', fn() => redirect('/services/industrial-automation#sub-control-robotics', 301));
    Route::get('/industrial-automation/test-quality', fn() => redirect('/services/industrial-automation#sub-test-quality', 301));
    Route::get('/ai-solutions-custom-ai-agents/marketing-search', fn() => redirect('/services/ai-solutions-custom-ai-agents#sub-marketing-search', 301));
    Route::get('/ai-solutions-custom-ai-agents/knowledge-productivity', fn() => redirect('/services/ai-solutions-custom-ai-agents#sub-knowledge-productivity', 301));
    Route::get('/ai-solutions-custom-ai-agents/lead-outreach', fn() => redirect('/services/ai-solutions-custom-ai-agents#sub-lead-outreach', 301));
    Route::get('/ai-solutions-custom-ai-agents/customer-communication', fn() => redirect('/services/ai-solutions-custom-ai-agents#sub-customer-communication', 301));

    // Legacy Path 301 Redirects to Closest Relevant V5 Category (Section 1.2 & Section 18)
    Route::any('/hvac/{any?}', fn() => redirect('/services/industrial-iot-solutions', 301))->where('any', '.*');
    Route::any('/hvac-solutions/{any?}', fn() => redirect('/services/industrial-iot-solutions', 301))->where('any', '.*');
    Route::any('/industrial-standard-machine/{any?}', fn() => redirect('/services/industrial-automation', 301))->where('any', '.*');
    Route::any('/industrial/{any?}', fn() => redirect('/services/industrial-automation', 301))->where('any', '.*');
    Route::any('/integration/{any?}', fn() => redirect('/services/industrial-automation', 301))->where('any', '.*');
    Route::any('/software/{any?}', fn() => redirect('/services/ai-solutions-custom-ai-agents', 301))->where('any', '.*');
    Route::any('/embedded/{any?}', fn() => redirect('/services/embedded-design-development', 301))->where('any', '.*');
    Route::any('/embedded-software/{any?}', fn() => redirect('/services/embedded-design-development', 301))->where('any', '.*');
    Route::any('/embedded_software/{any?}', fn() => redirect('/services/embedded-design-development', 301))->where('any', '.*');
    Route::any('/embedded-hardware/{any?}', fn() => redirect('/services/embedded-design-development', 301))->where('any', '.*');
    Route::any('/embedded_hardware/{any?}', fn() => redirect('/services/embedded-design-development', 301))->where('any', '.*');
    Route::any('/biomedical/{any?}', fn() => redirect('/services/embedded-design-development', 301))->where('any', '.*');
    Route::any('/lighting/{any?}', fn() => redirect('/services/embedded-design-development', 301))->where('any', '.*');

    // Dynamic Nested Individual Service Route
    Route::get('/{category_slug}/{service_slug}', [HomeController::class, 'serviceDetail'])->name('services.detail');
});

// Legacy root path 301 redirects
Route::any('/hvac/{any?}', fn() => redirect('/services/industrial-iot-solutions', 301))->where('any', '.*');
Route::any('/cnc/{any?}', fn() => redirect('/services/industrial-automation', 301))->where('any', '.*');
Route::any('/vmc/{any?}', fn() => redirect('/services/industrial-automation', 301))->where('any', '.*');
Route::any('/hmc/{any?}', fn() => redirect('/services/industrial-automation', 301))->where('any', '.*');
Route::any('/spm/{any?}', fn() => redirect('/services/industrial-automation', 301))->where('any', '.*');
Route::any('/industrial-standard-machine/{any?}', fn() => redirect('/services/industrial-automation', 301))->where('any', '.*');
    
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

    // OTP Login Routes
    Route::get('/login/otp/send', fn() => redirect()->route('frontend.auth.login'));
    Route::post('/login/otp/send', [\App\Http\Controllers\Frontend\AuthController::class, 'sendOtp'])->name('frontend.auth.send-otp');
    Route::post('/login/verify', [\App\Http\Controllers\Frontend\AuthController::class, 'verifyOtp'])->name('frontend.auth.verify-otp');

    // Forgot / Reset Password Routes
    Route::post('/forgot-password', [\App\Http\Controllers\Frontend\AuthController::class, 'sendResetLinkEmail'])->name('frontend.auth.password.email');
    Route::get('/reset-password/{token}', [\App\Http\Controllers\Frontend\AuthController::class, 'showResetPassword'])->name('frontend.auth.password.reset');
    Route::post('/reset-password', [\App\Http\Controllers\Frontend\AuthController::class, 'resetPassword'])->name('frontend.auth.password.update');
});

Route::post('/logout', [\App\Http\Controllers\Frontend\AuthController::class, 'logout'])->name('frontend.auth.logout');
Route::post('/checkout/calculate-delivery', [App\Http\Controllers\CheckoutController::class, 'calculateDelivery'])->name('checkout.calculate_delivery');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Frontend\DashboardController::class, 'profile'])->name('frontend.dashboard.profile');
    Route::post('/dashboard/profile', [\App\Http\Controllers\Frontend\DashboardController::class, 'updateProfile'])->name('frontend.dashboard.profile.update');
    Route::get('/dashboard/orders', [\App\Http\Controllers\Frontend\DashboardController::class, 'orders'])->name('frontend.dashboard.orders');
    Route::get('/dashboard/orders/{id}', [\App\Http\Controllers\Frontend\DashboardController::class, 'showOrder'])->name('frontend.dashboard.order.show');
    Route::get('/dashboard/orders/{id}/invoice', [\App\Http\Controllers\Frontend\InvoiceController::class, 'show'])->name('frontend.dashboard.order.invoice');
    Route::get('/dashboard/orders/{id}/invoice/pdf', [\App\Http\Controllers\Frontend\InvoiceController::class, 'downloadPdf'])->name('frontend.dashboard.order.invoice.pdf');
    Route::get('/dashboard/addresses', [\App\Http\Controllers\Frontend\DashboardController::class, 'addresses'])->name('frontend.dashboard.addresses');
    Route::post('/dashboard/addresses', [\App\Http\Controllers\Frontend\DashboardController::class, 'storeAddress'])->name('frontend.dashboard.addresses.store');
    Route::post('/dashboard/addresses/{id}', [\App\Http\Controllers\Frontend\DashboardController::class, 'updateAddress'])->name('frontend.dashboard.addresses.update');
    Route::delete('/dashboard/addresses/{id}', [\App\Http\Controllers\Frontend\DashboardController::class, 'deleteAddress'])->name('frontend.dashboard.addresses.delete');
});

// Public & Customer Tracking Routes
Route::get('/track/{token?}', [\App\Http\Controllers\TrackingController::class, 'show'])->name('tracking.public');
Route::post('/track', [\App\Http\Controllers\TrackingController::class, 'show'])->name('tracking.search');

// Courier Webhook Endpoint (CSRF-exempted in bootstrap/app.php)
Route::post('/api/webhooks/courier/{provider}', [\App\Http\Controllers\Api\CourierWebhookController::class, 'handle'])->name('api.courier.webhook');

// Delivery Personnel Portal
Route::prefix('delivery')->middleware(['auth', 'role:delivery,admin'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Delivery\DeliveryDashboardController::class, 'index'])->name('delivery.dashboard');
    Route::get('/shipments/{id}', [\App\Http\Controllers\Delivery\DeliveryDashboardController::class, 'show'])->name('delivery.shipments.show');
    Route::post('/shipments/{id}/progress', [\App\Http\Controllers\Delivery\DeliveryDashboardController::class, 'updateProgress'])->name('delivery.shipments.progress');
    Route::post('/shipments/{id}/attempt', [\App\Http\Controllers\Delivery\DeliveryDashboardController::class, 'submitAttempt'])->name('delivery.shipments.attempt');
});

// Admin Routes
use App\Http\Controllers\Admin\AdminController;

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'authenticate'])->name('admin.authenticate');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    
    Route::middleware(['auth', 'role:admin'])->group(function () {
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

        // Settings & Payment QR
        Route::get('/settings', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('admin.settings.index');
        Route::post('/settings/qr-code', [App\Http\Controllers\Admin\SettingController::class, 'updateQrCode'])->name('admin.settings.qr_code');
        Route::post('/settings/delivery-charge', [App\Http\Controllers\Admin\SettingController::class, 'updateDeliveryCharge'])->name('admin.settings.delivery_charge');
        Route::post('/settings/shiprocket', [App\Http\Controllers\Admin\SettingController::class, 'updateShiprocket'])->name('admin.settings.shiprocket');
        Route::post('/settings/invoice', [App\Http\Controllers\Admin\SettingController::class, 'updateInvoiceSettings'])->name('admin.settings.invoice');

        // Orders Management
        Route::resource('orders', App\Http\Controllers\Admin\OrderController::class)->names('admin.orders');
        Route::get('/orders/{order}/invoice', [\App\Http\Controllers\Admin\InvoiceController::class, 'show'])->name('admin.orders.invoice');
        Route::get('/orders/{order}/invoice/pdf', [\App\Http\Controllers\Admin\InvoiceController::class, 'downloadPdf'])->name('admin.orders.invoice.pdf');
        Route::post('/orders/{order}/shipment', [App\Http\Controllers\Admin\OrderController::class, 'createShipment'])->name('admin.orders.shipment');
        Route::post('/orders/{order}/manage-shipment', [App\Http\Controllers\Admin\OrderController::class, 'updateShipment'])->name('admin.orders.update_shipment');
        Route::post('/orders/{order}/mark-delivered', [App\Http\Controllers\Admin\OrderController::class, 'markDelivered'])->name('admin.orders.mark_delivered');

        // Inventory Management
        Route::get('/inventory', [\App\Http\Controllers\Admin\InventoryController::class, 'index'])->name('admin.inventory.index');
        Route::post('/inventory/adjust', [\App\Http\Controllers\Admin\InventoryController::class, 'adjust'])->name('admin.inventory.adjust');
        Route::get('/inventory/movements', [\App\Http\Controllers\Admin\InventoryController::class, 'movements'])->name('admin.inventory.movements');
        Route::get('/inventory/export', [\App\Http\Controllers\Admin\InventoryController::class, 'exportCsv'])->name('admin.inventory.export');
        Route::post('/inventory/import', [\App\Http\Controllers\Admin\InventoryController::class, 'importCsv'])->name('admin.inventory.import');

        // Warehouses
        Route::resource('warehouses', \App\Http\Controllers\Admin\WarehouseController::class)->names('admin.warehouses');

        // Suppliers & Purchase Orders
        Route::resource('suppliers', \App\Http\Controllers\Admin\SupplierController::class)->names('admin.suppliers');
        Route::resource('purchase_orders', \App\Http\Controllers\Admin\PurchaseOrderController::class)->names('admin.purchase_orders');
        Route::post('/purchase_orders/{purchase_order}/receive', [\App\Http\Controllers\Admin\PurchaseOrderController::class, 'receive'])->name('admin.purchase_orders.receive');

        // Shipments & Courier Dispatch
        Route::resource('shipments', \App\Http\Controllers\Admin\ShipmentController::class)->only(['index', 'show'])->names('admin.shipments');
        Route::post('/shipments/{shipment}/status', [\App\Http\Controllers\Admin\ShipmentController::class, 'updateStatus'])->name('admin.shipments.status');
        Route::post('/shipments/{shipment}/attempt', [\App\Http\Controllers\Admin\ShipmentController::class, 'logAttempt'])->name('admin.shipments.attempt');

        // Delivery Personnel Management
        Route::resource('delivery_personnel', \App\Http\Controllers\Admin\DeliveryPersonnelController::class)->names('admin.delivery_personnel');
        Route::post('/delivery_personnel/{personnel}/toggle', [\App\Http\Controllers\Admin\DeliveryPersonnelController::class, 'toggleAvailability'])->name('admin.delivery_personnel.toggle');
    });
});

// Checkout Routes
Route::get('/checkout/{product?}', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/{product?}', [App\Http\Controllers\CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/checkout/success/{order}', [App\Http\Controllers\CheckoutController::class, 'success'])->name('checkout.success');
