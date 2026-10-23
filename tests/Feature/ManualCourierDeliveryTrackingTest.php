<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Category;
use App\Models\Warehouse;

class ManualCourierDeliveryTrackingTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;
    protected User $customer;
    protected User $otherCustomer;
    protected Product $product;
    protected Warehouse $warehouse;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@tcsmarttechnology.com',
            'password' => bcrypt('password123'),
            'role' => 'admin',
            'is_active' => true,
        ]);

        $this->customer = User::create([
            'name' => 'Shahad Customer',
            'email' => 'customer@tcsmarttechnology.com',
            'password' => bcrypt('password123'),
            'role' => 'customer',
            'is_active' => true,
        ]);

        $this->otherCustomer = User::create([
            'name' => 'Other Customer',
            'email' => 'other@tcsmarttechnology.com',
            'password' => bcrypt('password123'),
            'role' => 'customer',
            'is_active' => true,
        ]);

        $this->warehouse = Warehouse::create([
            'name' => 'Main Test Hub',
            'code' => 'WH-TEST',
            'city' => 'Bengaluru',
            'state' => 'Karnataka',
            'pincode' => '110025',
            'is_active' => true,
            'is_default' => true,
        ]);

        $category = Category::create([
            'name' => 'Smart Sensors',
            'slug' => 'smart-sensors',
            'is_active' => true,
        ]);

        $this->product = Product::create([
            'category_id' => $category->id,
            'name' => 'Smart Gas Sensor Pro',
            'slug' => 'smart-gas-sensor-pro',
            'price' => 1499.00,
            'is_active' => true,
        ]);
    }

    protected function createOrder(array $attributes = []): Order
    {
        return Order::create(array_merge([
            'order_number' => 'ORD-TEST-' . strtoupper(uniqid()),
            'tracking_token' => bin2hex(random_bytes(16)),
            'user_id' => $this->customer->id,
            'customer_name' => 'Shahad Customer',
            'mobile' => '9876543210',
            'email' => 'customer@tcsmarttechnology.com',
            'address' => 'Plot 42, Electronics City',
            'city' => 'Bengaluru',
            'state' => 'Karnataka',
            'pincode' => '560100',
            'amount' => 1499.00,
            'payment_method' => 'QR',
            'payment_status' => 'paid',
            'status' => 'processing',
            'delivery_type' => 'courier',
        ], $attributes));
    }

    public function test_admin_can_manually_add_shipment_details_with_standard_courier()
    {
        $order = $this->createOrder();

        $response = $this->actingAs($this->admin)->post(route('admin.orders.update_shipment', $order->id), [
            'courier_partner' => 'Delhivery',
            'tracking_id' => 'DEL1234567890',
            'tracking_url' => 'https://www.delhivery.com/track/package/DEL1234567890',
            'shipped_at' => now()->format('Y-m-d'),
            'delivery_status' => 'shipped',
            'delivery_notes' => 'Fragile parcel, handle with care',
        ]);

        $response->assertSessionHas('success');

        // Check orders table
        $order->refresh();
        $this->assertEquals('Delhivery', $order->courier_name);
        $this->assertEquals('DEL1234567890', $order->tracking_id);
        $this->assertEquals('https://www.delhivery.com/track/package/DEL1234567890', $order->tracking_url);
        $this->assertEquals('shipped', $order->delivery_status);
        $this->assertEquals('dispatched', $order->status);

        // Check shipments table
        $this->assertDatabaseHas('shipments', [
            'order_id' => $order->id,
            'courier_name' => 'Delhivery',
            'awb_number' => 'DEL1234567890',
            'tracking_number' => 'DEL1234567890',
            'status' => 'shipped',
        ]);

        // Check shipment event was recorded
        $this->assertDatabaseHas('shipment_events', [
            'status' => 'shipped',
            'source' => 'admin',
        ]);
    }

    public function test_admin_can_use_other_courier_with_custom_name_and_url()
    {
        $order = $this->createOrder();

        $response = $this->actingAs($this->admin)->post(route('admin.orders.update_shipment', $order->id), [
            'courier_partner' => 'Other',
            'custom_courier_name' => 'Trackon Express',
            'tracking_id' => 'TRK888777666',
            'tracking_url' => 'https://trackon.in/tracking/TRK888777666',
            'shipped_at' => now()->format('Y-m-d'),
            'delivery_status' => 'in_transit',
        ]);

        $response->assertSessionHas('success');

        $order->refresh();
        $this->assertEquals('Trackon Express', $order->courier_name);
        $this->assertEquals('TRK888777666', $order->tracking_id);
        $this->assertEquals('in_transit', $order->delivery_status);
    }

    public function test_admin_can_update_delivery_status_to_delivered()
    {
        $order = $this->createOrder([
            'courier_name' => 'Blue Dart',
            'tracking_id' => 'BLU112233',
            'tracking_url' => 'https://www.bluedart.com/web/guest/trackdartresult?trackFor=0&trackNo=BLU112233',
            'delivery_status' => 'shipped',
        ]);

        // Admin updates status to Delivered
        $response = $this->actingAs($this->admin)->post(route('admin.orders.update_shipment', $order->id), [
            'courier_partner' => 'Blue Dart',
            'tracking_id' => 'BLU112233',
            'tracking_url' => 'https://www.bluedart.com/web/guest/trackdartresult?trackFor=0&trackNo=BLU112233',
            'shipped_at' => now()->format('Y-m-d'),
            'delivery_status' => 'delivered',
        ]);

        $response->assertSessionHas('success');

        $order->refresh();
        $this->assertEquals('delivered', $order->delivery_status);
        $this->assertEquals('delivered', $order->status);

        $this->assertDatabaseHas('shipments', [
            'order_id' => $order->id,
            'status' => 'delivered',
        ]);
    }

    public function test_customer_can_view_courier_and_tracking_button_for_own_order()
    {
        $order = $this->createOrder([
            'courier_name' => 'DTDC',
            'tracking_id' => 'DTD998877',
            'tracking_url' => 'https://track.dtdc.com/ctbs-tracking/customerInterface.tr?submitName=showTrackingDetail&strCnno=DTD998877',
            'shipped_at' => now(),
            'delivery_status' => 'in_transit',
        ]);

        $response = $this->actingAs($this->customer)->get(route('frontend.dashboard.order.show', $order->id));

        $response->assertOk();
        $response->assertSee('Courier Delivery Tracking');
        $response->assertSee($order->order_number);
        $response->assertSee('DTDC');
        $response->assertSee('DTD998877');
        $response->assertSee('In Transit');
        $response->assertSee('Track Your Order');
        $response->assertSee('https://track.dtdc.com/ctbs-tracking/customerInterface.tr?submitName=showTrackingDetail&strCnno=DTD998877');
        $response->assertSee('Delivery statuses displayed here are updated manually');
    }

    public function test_customer_cannot_view_another_customers_order()
    {
        $order = $this->createOrder();

        $response = $this->actingAs($this->otherCustomer)->get(route('frontend.dashboard.order.show', $order->id));

        $response->assertNotFound();
    }

    public function test_customer_sees_pending_tracking_notice_when_not_yet_dispatched()
    {
        $order = $this->createOrder([
            'courier_name' => null,
            'tracking_id' => null,
            'tracking_url' => null,
            'delivery_status' => 'processing',
        ]);

        $response = $this->actingAs($this->customer)->get(route('frontend.dashboard.order.show', $order->id));

        $response->assertOk();
        $response->assertSee('Tracking Details Pending');
        $response->assertSee('Track Your Order (Not Yet Available)');
        $response->assertSee('disabled');
    }

    public function test_validation_fails_for_missing_required_fields_or_invalid_url()
    {
        $order = $this->createOrder();

        $response = $this->actingAs($this->admin)->post(route('admin.orders.update_shipment', $order->id), [
            'courier_partner' => '',
            'tracking_id' => '',
            'tracking_url' => 'not-a-valid-url',
            'delivery_status' => 'invalid_status',
        ]);

        $response->assertSessionHasErrors(['courier_partner', 'tracking_id', 'tracking_url', 'delivery_status']);
    }

    public function test_admin_can_update_order_to_delivered_via_general_order_status_update()
    {
        $order = $this->createOrder([
            'status' => 'processing',
            'delivery_status' => 'processing',
        ]);

        $response = $this->actingAs($this->admin)->put(route('admin.orders.update', $order->id), [
            'status' => 'delivered',
        ]);

        $response->assertSessionHas('success');

        $order->refresh();
        $this->assertEquals('delivered', $order->status);
        $this->assertEquals('delivered', $order->delivery_status);
        $this->assertTrue($order->isDelivered());
        $this->assertEquals('paid', $order->payment_status);

        $this->assertDatabaseHas('shipments', [
            'order_id' => $order->id,
            'status' => 'delivered',
        ]);
    }

    public function test_admin_can_mark_order_as_delivered_via_dedicated_endpoint()
    {
        $order = $this->createOrder([
            'status' => 'dispatched',
            'delivery_status' => 'shipped',
        ]);

        $response = $this->actingAs($this->admin)->post(route('admin.orders.mark_delivered', $order->id));

        $response->assertSessionHas('success');

        $order->refresh();
        $this->assertEquals('delivered', $order->status);
        $this->assertEquals('delivered', $order->delivery_status);
        $this->assertTrue($order->isDelivered());

        // Check AJAX response as well
        $order2 = $this->createOrder(['status' => 'processing']);
        $ajaxResponse = $this->actingAs($this->admin)->postJson(route('admin.orders.mark_delivered', $order2->id));
        $ajaxResponse->assertOk();
        $ajaxResponse->assertJson([
            'success' => true,
            'status' => 'delivered',
            'delivery_status' => 'delivered',
        ]);
    }

    public function test_admin_orders_index_page_contains_delivered_option_and_button()
    {
        $order = $this->createOrder(['status' => 'processing']);

        $response = $this->actingAs($this->admin)->get(route('admin.orders.index'));

        $response->assertOk();
        $response->assertSee('value="delivered"', false);
        $response->assertSee('Mark Delivered');
    }
}
