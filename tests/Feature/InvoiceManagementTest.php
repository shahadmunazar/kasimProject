<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Category;
use App\Models\Setting;

class InvoiceManagementTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;
    protected User $customer;
    protected User $otherCustomer;
    protected Product $product;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::create([
            'name' => 'Admin Manager',
            'email' => 'admin@tcsmarttechnology.com',
            'password' => bcrypt('password123'),
            'role' => 'admin',
            'is_active' => true,
        ]);

        $this->customer = User::create([
            'name' => 'Shahad Munazar',
            'email' => 'shahad@example.com',
            'password' => bcrypt('password123'),
            'role' => 'customer',
            'is_active' => true,
        ]);

        $this->otherCustomer = User::create([
            'name' => 'Other Buyer',
            'email' => 'other@example.com',
            'password' => bcrypt('password123'),
            'role' => 'customer',
            'is_active' => true,
        ]);

        $category = Category::create([
            'name' => 'IIoT Sensors',
            'slug' => 'iiot-sensors',
            'is_active' => true,
        ]);

        $this->product = Product::create([
            'category_id' => $category->id,
            'name' => 'Industrial Vibration Sensor',
            'slug' => 'industrial-vibration-sensor',
            'price' => 244.00,
            'is_active' => true,
        ]);
    }

    protected function createOrder(array $attributes = []): Order
    {
        $order = Order::create(array_merge([
            'order_number' => 'ORD-INV-' . strtoupper(uniqid()),
            'tracking_token' => bin2hex(random_bytes(16)),
            'user_id' => $this->customer->id,
            'customer_name' => 'Shahad Munazar',
            'mobile' => '9876543210',
            'email' => 'shahad@example.com',
            'address' => 'G-194 Sector 63',
            'city' => 'Noida',
            'state' => 'Uttar Pradesh',
            'pincode' => '201301',
            'amount' => 443.20,
            'delivery_charge' => 199.20,
            'delivery_distance_km' => 21.15,
            'payment_method' => 'QR',
            'payment_status' => 'paid',
            'status' => 'delivered',
            'courier_name' => 'Delhivery',
            'tracking_id' => 'DEL888999',
            'delivery_status' => 'delivered',
        ], $attributes));

        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $this->product->id,
            'quantity' => 1,
            'price' => 244.00,
        ]);

        return $order;
    }

    public function test_admin_can_update_invoice_settings()
    {
        $response = $this->actingAs($this->admin)->post(route('admin.settings.invoice'), [
            'invoice_company_name' => 'TC SMART TECHNOLOGY LABS PVT LTD',
            'invoice_brand_name' => 'TC Smart Tech Pro',
            'invoice_gstin' => '09AABCT1234F1Z9',
            'invoice_pan' => 'AABCT1234F',
            'invoice_address' => 'Suite 500, Sector 62',
            'invoice_city' => 'Noida',
            'invoice_state' => 'Uttar Pradesh',
            'invoice_state_code' => '09',
            'invoice_pincode' => '201309',
            'invoice_phone' => '+91 99999 88888',
            'invoice_email' => 'accounts@tcsmarttechnology.com',
            'invoice_website' => 'https://tcsmarttechnology.com',
            'invoice_prefix' => 'TCS-INV-',
            'invoice_default_hsn' => '8542',
            'invoice_tax_rate' => '18',
            'invoice_bank_name' => 'ICICI Bank',
            'invoice_bank_account' => '112233445566',
            'invoice_bank_ifsc' => 'ICIC0001122',
            'invoice_bank_branch' => 'Noida Branch',
            'invoice_upi_id' => 'tcsmartlabs@icici',
            'invoice_authorized_signatory' => 'For TC SMART TECHNOLOGY - CFO',
            'invoice_terms' => 'Warranty applies. Local jurisdiction only.',
        ]);

        $response->assertSessionHas('success');

        $this->assertEquals('TC SMART TECHNOLOGY LABS PVT LTD', Setting::where('key', 'invoice_company_name')->value('value'));
        $this->assertEquals('09AABCT1234F1Z9', Setting::where('key', 'invoice_gstin')->value('value'));
        $this->assertEquals('TCS-INV-', Setting::where('key', 'invoice_prefix')->value('value'));
    }

    public function test_customer_can_view_own_tax_invoice_with_seller_and_buyer_details()
    {
        $order = $this->createOrder();

        $response = $this->actingAs($this->customer)->get(route('frontend.dashboard.order.invoice', $order->id));

        $response->assertOk();
        $response->assertSee('Tax Invoice');
        $response->assertSee('ORIGINAL FOR RECIPIENT');
        // Seller details
        $response->assertSee('Sold By (Seller)');
        // Buyer details
        $response->assertSee('Billed &amp; Shipped To (Buyer)', false);
        $response->assertSee('Shahad Munazar');
        $response->assertSee('G-194 Sector 63');
        $response->assertSee('Noida');
        // Product line details
        $response->assertSee('Industrial Vibration Sensor');
        $response->assertSee('443.20');
        // Courier delivery details
        $response->assertSee('Delhivery');
        $response->assertSee('DEL888999');
        $response->assertSee('DELIVERED ORDER');
    }

    public function test_customer_can_download_invoice_as_pdf()
    {
        $order = $this->createOrder();

        $response = $this->actingAs($this->customer)->get(route('frontend.dashboard.order.invoice.pdf', $order->id));

        $response->assertOk();
        $this->assertEquals('application/pdf', $response->headers->get('Content-Type'));
        $this->assertStringContainsString('Invoice_', $response->headers->get('Content-Disposition'));
        // Verify PDF binary header
        $this->assertStringStartsWith('%PDF-', $response->getContent());
    }

    public function test_customer_cannot_view_another_customers_invoice()
    {
        $order = $this->createOrder();

        $response = $this->actingAs($this->otherCustomer)->get(route('frontend.dashboard.order.invoice', $order->id));

        $response->assertNotFound();
    }

    public function test_admin_can_view_and_download_any_order_invoice()
    {
        $order = $this->createOrder();

        // Admin views invoice
        $viewResponse = $this->actingAs($this->admin)->get(route('admin.orders.invoice', $order->id));
        $viewResponse->assertOk();
        $viewResponse->assertSee($order->customer_name);

        // Admin downloads PDF
        $pdfResponse = $this->actingAs($this->admin)->get(route('admin.orders.invoice.pdf', $order->id));
        $pdfResponse->assertOk();
        $this->assertEquals('application/pdf', $pdfResponse->headers->get('Content-Type'));
        $this->assertStringStartsWith('%PDF-', $pdfResponse->getContent());
    }

    public function test_order_details_page_shows_invoice_buttons_when_delivered()
    {
        $order = $this->createOrder(['status' => 'delivered', 'delivery_status' => 'delivered']);

        $response = $this->actingAs($this->customer)->get(route('frontend.dashboard.order.show', $order->id));

        $response->assertOk();
        $response->assertSee('Tax Invoice');
        $response->assertSee('Package Successfully Delivered');
        $response->assertSee('Download PDF');
        $response->assertDontSee('Print Receipt');
    }

    public function test_order_details_page_hides_invoice_and_print_receipt_when_not_delivered()
    {
        $order = $this->createOrder(['status' => 'pending', 'delivery_status' => 'processing']);

        $response = $this->actingAs($this->customer)->get(route('frontend.dashboard.order.show', $order->id));

        $response->assertOk();
        $response->assertDontSee('Tax Invoice');
        $response->assertDontSee('Print Receipt');
        $response->assertDontSee('Package Successfully Delivered');
    }

    public function test_customer_cannot_access_invoice_endpoint_before_delivery()
    {
        $order = $this->createOrder(['status' => 'pending', 'delivery_status' => 'processing']);

        // Web invoice endpoint redirects
        $viewResponse = $this->actingAs($this->customer)->get(route('frontend.dashboard.order.invoice', $order->id));
        $viewResponse->assertRedirect(route('frontend.dashboard.order.show', $order->id));
        $viewResponse->assertSessionHas('info');

        // PDF download endpoint redirects
        $pdfResponse = $this->actingAs($this->customer)->get(route('frontend.dashboard.order.invoice.pdf', $order->id));
        $pdfResponse->assertRedirect(route('frontend.dashboard.order.show', $order->id));
        $pdfResponse->assertSessionHas('info');
    }
}
