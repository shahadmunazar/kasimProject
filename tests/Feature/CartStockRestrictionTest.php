<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\CartItem;
use App\Services\CartService;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CartStockRestrictionTest extends TestCase
{
    use RefreshDatabase;

    protected Category $category;

    protected function setUp(): void
    {
        parent::setUp();

        $this->category = Category::create([
            'name' => 'Sensors',
            'slug' => 'sensors',
            'is_active' => true,
        ]);
    }

    public function test_cannot_add_out_of_stock_product_to_cart()
    {
        $product = Product::create([
            'category_id' => $this->category->id,
            'name' => 'Out of Stock Sensor',
            'slug' => 'out-of-stock-sensor',
            'price' => 500,
            'stock_quantity' => 0,
            'track_inventory' => true,
            'is_active' => true,
        ]);

        $response = $this->postJson(route('cart.add'), [
            'product_id' => $product->id,
            'quantity' => 1
        ]);

        $response->assertStatus(422);
        $response->assertJson([
            'success' => false,
            'error' => 'out_of_stock'
        ]);
        $response->assertJsonFragment([
            'available_stock' => 0
        ]);
    }

    public function test_cannot_add_quantity_exceeding_available_stock()
    {
        $product = Product::create([
            'category_id' => $this->category->id,
            'name' => 'Limited IoT Module',
            'slug' => 'limited-iot-module',
            'price' => 750,
            'stock_quantity' => 3,
            'track_inventory' => true,
            'is_active' => true,
        ]);

        $response = $this->postJson(route('cart.add'), [
            'product_id' => $product->id,
            'quantity' => 5
        ]);

        $response->assertStatus(422);
        $response->assertJson([
            'success' => false,
            'error' => 'stock_limit_exceeded'
        ]);
        $this->assertStringContainsString('3', $response->json('message'));
    }

    public function test_cannot_add_more_when_already_in_cart_reaching_stock_limit()
    {
        $product = Product::create([
            'category_id' => $this->category->id,
            'name' => 'Pressure Transmitter',
            'slug' => 'pressure-transmitter',
            'price' => 1200,
            'stock_quantity' => 4,
            'track_inventory' => true,
            'is_active' => true,
        ]);

        // Add 3 to cart - succeeds
        $firstResponse = $this->postJson(route('cart.add'), [
            'product_id' => $product->id,
            'quantity' => 3
        ]);
        $firstResponse->assertStatus(200);
        $firstResponse->assertJson(['success' => true]);

        // Add 2 more (3 + 2 = 5 > 4 available) - fails
        $secondResponse = $this->postJson(route('cart.add'), [
            'product_id' => $product->id,
            'quantity' => 2
        ]);
        $secondResponse->assertStatus(422);
        $secondResponse->assertJson([
            'success' => false,
            'error' => 'stock_limit_exceeded'
        ]);
        $this->assertStringContainsString('Only 4 items are available in stock', $secondResponse->json('message'));
    }

    public function test_cannot_update_cart_quantity_beyond_available_stock()
    {
        $product = Product::create([
            'category_id' => $this->category->id,
            'name' => 'Smart Energy Meter',
            'slug' => 'smart-energy-meter',
            'price' => 1800,
            'stock_quantity' => 2,
            'track_inventory' => true,
            'is_active' => true,
        ]);

        // Add 1 to cart
        $addRes = CartService::add($product->id, 1);
        $this->assertTrue($addRes['success']);
        $cartItemId = $addRes['item']->id;

        // Try updating to 5 (which exceeds available stock of 2)
        $updateResponse = $this->postJson(route('cart.update'), [
            'item_id' => $cartItemId,
            'quantity' => 5
        ]);

        $updateResponse->assertStatus(422);
        $updateResponse->assertJson([
            'success' => false,
            'available_stock' => 2
        ]);

        // Verify cart item quantity is still 1
        $this->assertEquals(1, CartItem::find($cartItemId)->quantity);
    }

    public function test_cart_page_shows_available_stock_badges()
    {
        $product = Product::create([
            'category_id' => $this->category->id,
            'name' => 'Vibration Sensor V2',
            'slug' => 'vibration-sensor-v2',
            'price' => 950,
            'stock_quantity' => 4,
            'track_inventory' => true,
            'is_active' => true,
        ]);

        CartService::add($product->id, 2);

        $response = $this->get(route('cart.index'));
        $response->assertStatus(200);
        $response->assertSee('Only 4 available');
        $response->assertSee('Vibration Sensor V2');
    }

    public function test_cart_drawer_shows_available_stock()
    {
        $product = Product::create([
            'category_id' => $this->category->id,
            'name' => 'Temperature Probe',
            'slug' => 'temperature-probe',
            'price' => 450,
            'stock_quantity' => 5,
            'track_inventory' => true,
            'is_active' => true,
        ]);

        CartService::add($product->id, 1);

        $response = $this->get(route('cart.mini'));
        $response->assertStatus(200);
        $response->assertJsonStructure(['html', 'count', 'subtotal']);
        $this->assertStringContainsString('Only 5 left', $response->json('html'));
    }
}
