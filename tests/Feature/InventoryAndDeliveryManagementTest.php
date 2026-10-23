<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Warehouse;
use App\Models\WarehouseStock;
use App\Models\Supplier;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipment;
use App\Models\ShipmentEvent;
use App\Models\DeliveryPersonnel;
use App\Services\InventoryService;
use Illuminate\Support\Str;

class InventoryAndDeliveryManagementTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;
    protected Warehouse $warehouse;
    protected Category $category;
    protected Product $product;

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

        $this->warehouse = Warehouse::create([
            'name' => 'Main Test Hub',
            'code' => 'WH-TEST',
            'city' => 'Bengaluru',
            'state' => 'Karnataka',
            'pincode' => '110025',
            'is_active' => true,
            'is_default' => true,
        ]);

        $this->category = Category::create([
            'name' => 'IoT Smart Sensors',
            'slug' => 'iot-smart-sensors',
            'is_active' => true,
        ]);

        $this->product = Product::create([
            'category_id' => $this->category->id,
            'name' => 'Smart Industrial Gas Sensor',
            'slug' => 'smart-industrial-gas-sensor',
            'sku' => 'TC-GAS-001',
            'price' => 1500.00,
            'cost_price' => 900.00,
            'stock_quantity' => 20,
            'low_stock_threshold' => 5,
            'track_inventory' => true,
            'stock_status' => 'in_stock',
            'is_active' => true,
        ]);

        WarehouseStock::create([
            'warehouse_id' => $this->warehouse->id,
            'product_id' => $this->product->id,
            'quantity_on_hand' => 20,
            'quantity_reserved' => 0,
            'reorder_level' => 5,
        ]);
    }

    public function test_stock_reservation_and_release()
    {
        $service = new InventoryService();

        // 1. Reserve 5 units
        $reservation = $service->reserveStock($this->product->id, 5, $this->warehouse->id, 'session_123');
        $this->assertEquals('reserved', $reservation->status);
        $this->assertEquals(5, $reservation->quantity);

        // Check available stock (20 on hand - 5 reserved = 15 available)
        $this->assertEquals(15, $this->product->fresh()->availableStock());

        // 2. Release reservation
        $service->releaseReservation($reservation);
        $this->assertEquals('released', $reservation->fresh()->status);
        $this->assertEquals(20, $this->product->fresh()->availableStock());
    }

    public function test_purchase_order_goods_receipt_increases_stock()
    {
        $supplier = Supplier::create([
            'name' => 'Apex Sensor Supplies',
            'email' => 'sales@apexsensors.com',
            'phone' => '9876543210',
            'is_active' => true,
        ]);

        $po = PurchaseOrder::create([
            'po_number' => 'PO-TEST-001',
            'supplier_id' => $supplier->id,
            'warehouse_id' => $this->warehouse->id,
            'status' => 'ordered',
            'total_amount' => 9000.00,
            'order_date' => now(),
        ]);

        $poItem = PurchaseOrderItem::create([
            'purchase_order_id' => $po->id,
            'product_id' => $this->product->id,
            'quantity_ordered' => 10,
            'quantity_received' => 0,
            'unit_cost' => 900.00,
            'total_cost' => 9000.00,
        ]);

        $service = new InventoryService();
        $service->receivePurchaseOrder($po, [$poItem->id => 10], $this->admin->id);

        $this->assertEquals('received', $po->fresh()->status);
        $this->assertEquals(30, $this->product->fresh()->stock_quantity); // 20 initial + 10 received
        
        $this->assertDatabaseHas('stock_movements', [
            'product_id' => $this->product->id,
            'type' => 'purchase_receipt',
            'quantity' => 10,
            'new_quantity' => 30,
        ]);
    }

    public function test_order_sale_deducts_stock_and_cancellation_restocks()
    {
        $service = new InventoryService();

        $order = Order::create([
            'order_number' => 'ORD-TEST-001',
            'tracking_token' => Str::random(32),
            'customer_name' => 'John Doe',
            'mobile' => '9876543210',
            'email' => 'john@example.com',
            'address' => '123 Tech Park',
            'city' => 'Bengaluru',
            'state' => 'Karnataka',
            'pincode' => '110025',
            'amount' => 3000.00,
            'payment_method' => 'QR',
            'payment_status' => 'paid',
            'status' => 'approved',
        ]);

        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $this->product->id,
            'quantity' => 2,
            'price' => 1500.00,
        ]);

        // Deduct for order
        $service->commitOrderSale($order);
        $this->assertEquals(18, $this->product->fresh()->stock_quantity);

        $this->assertDatabaseHas('stock_movements', [
            'product_id' => $this->product->id,
            'type' => 'order_sale',
            'quantity' => -2,
            'new_quantity' => 18,
        ]);

        // Now cancel order and verify restock
        $service->restockForOrder($order, 'Order cancelled by customer', $this->admin->id);
        $this->assertEquals(20, $this->product->fresh()->stock_quantity);

        $this->assertDatabaseHas('stock_movements', [
            'product_id' => $this->product->id,
            'type' => 'order_return',
            'quantity' => 2,
            'new_quantity' => 20,
        ]);
    }

    public function test_shipment_lifecycle_and_proof_of_delivery()
    {
        $order = Order::create([
            'order_number' => 'ORD-SHIP-001',
            'tracking_token' => Str::random(32),
            'customer_name' => 'Alice Kumar',
            'mobile' => '9876543211',
            'address' => '456 MG Road',
            'city' => 'Bengaluru',
            'state' => 'Karnataka',
            'pincode' => '110025',
            'amount' => 1500.00,
            'payment_method' => 'QR',
            'status' => 'approved',
        ]);

        $deliveryUser = User::create([
            'name' => 'Rider Ramesh',
            'email' => 'ramesh@tcsmarttechnology.com',
            'password' => bcrypt('password123'),
            'role' => 'delivery',
            'is_active' => true,
        ]);

        $personnel = DeliveryPersonnel::create([
            'user_id' => $deliveryUser->id,
            'employee_code' => 'DEL-RAMESH-01',
            'vehicle_type' => 'Bike',
            'is_available' => true,
        ]);

        $shipment = Shipment::create([
            'shipment_number' => 'SHP-TEST-001',
            'order_id' => $order->id,
            'warehouse_id' => $this->warehouse->id,
            'delivery_type' => 'manual',
            'delivery_personnel_id' => $personnel->id,
            'status' => 'shipped',
            'shipped_at' => now(),
        ]);

        ShipmentEvent::create([
            'shipment_id' => $shipment->id,
            'status' => 'shipped',
            'location' => 'Main Hub',
            'description' => 'Dispatched with delivery rider Ramesh',
            'source' => 'admin',
            'event_timestamp' => now(),
        ]);

        // Complete delivery attempt via Delivery Personnel Portal
        $response = $this->actingAs($deliveryUser)->post(route('delivery.shipments.attempt', $shipment->id), [
            'status' => 'delivered',
            'recipient_name' => 'Alice Kumar',
            'notes' => 'Received at door by customer',
        ]);

        $response->assertRedirect(route('delivery.dashboard'));
        $this->assertEquals('delivered', $shipment->fresh()->status);
        $this->assertEquals('delivered', $order->fresh()->status);
        $this->assertEquals('Alice Kumar', $shipment->fresh()->recipient_name);
    }

    public function test_customer_public_tracking_page_accessible()
    {
        $token = Str::random(32);
        $order = Order::create([
            'order_number' => 'ORD-TRACK-001',
            'tracking_token' => $token,
            'customer_name' => 'Vikram Patel',
            'mobile' => '9123456789',
            'address' => '789 Residency Road',
            'city' => 'Bengaluru',
            'state' => 'Karnataka',
            'pincode' => '560025',
            'amount' => 1500.00,
            'payment_method' => 'QR',
            'status' => 'approved',
        ]);

        // 1. Access by tracking token
        $response = $this->get(route('tracking.public', ['token' => $token]));
        $response->assertStatus(200);
        $response->assertSee('ORD-TRACK-001');
        $response->assertSee('Vikram Patel');

        // 2. Access via search form
        $searchResponse = $this->post(route('tracking.search'), [
            'order_number' => 'ORD-TRACK-001',
            'phone' => '9123456789',
        ]);
        $searchResponse->assertStatus(200);
        $searchResponse->assertSee('ORD-TRACK-001');
    }
}
