<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductStockDisplayTest extends TestCase
{
    use RefreshDatabase;

    protected function createCategory(): Category
    {
        return Category::create([
            'name' => 'Watches',
            'slug' => 'watches-' . uniqid(),
            'is_active' => true,
        ]);
    }

    public function test_product_page_shows_urgency_badge_and_left_count_when_stock_is_10_or_less()
    {
        $category = $this->createCategory();

        $product = Product::create([
            'category_id' => $category->id,
            'name' => 'Chandan Singh fd',
            'slug' => 'chandan-singh-fd',
            'sku' => 'CS-FD-001',
            'price' => 500,
            'stock_quantity' => 10,
            'track_inventory' => true,
            'stock_status' => 'in_stock',
            'low_stock_threshold' => 5,
            'is_active' => true,
        ]);

        $response = $this->get(route('product.details', $product->slug));

        $response->assertStatus(200);
        $response->assertSee('Only 10 items left in stock — order soon!');
        $response->assertSee('10 left');
        $response->assertSee('Limited Inventory');
    }

    public function test_product_page_shows_exact_count_when_fewer_than_10_items_left()
    {
        $category = $this->createCategory();

        $product = Product::create([
            'category_id' => $category->id,
            'name' => 'Rare Collector Watch',
            'slug' => 'rare-collector-watch',
            'sku' => 'RCW-002',
            'price' => 1500,
            'stock_quantity' => 3,
            'track_inventory' => true,
            'stock_status' => 'in_stock',
            'low_stock_threshold' => 2,
            'is_active' => true,
        ]);

        $response = $this->get(route('product.details', $product->slug));

        $response->assertStatus(200);
        $response->assertSee('Only 3 items left in stock — order soon!');
        $response->assertSee('3 left');
    }

    public function test_product_page_shows_regular_in_stock_when_more_than_10_items_left()
    {
        $category = $this->createCategory();

        $product = Product::create([
            'category_id' => $category->id,
            'name' => 'High Stock Item',
            'slug' => 'high-stock-item',
            'sku' => 'HSI-003',
            'price' => 200,
            'stock_quantity' => 25,
            'track_inventory' => true,
            'stock_status' => 'in_stock',
            'low_stock_threshold' => 5,
            'is_active' => true,
        ]);

        $response = $this->get(route('product.details', $product->slug));

        $response->assertStatus(200);
        $response->assertSee('In Stock (25 available)');
        $response->assertDontSee('Limited Inventory');
    }

    public function test_product_page_shows_out_of_stock_when_zero_available()
    {
        $category = $this->createCategory();

        $product = Product::create([
            'category_id' => $category->id,
            'name' => 'Sold Out Item',
            'slug' => 'sold-out-item',
            'sku' => 'SOI-004',
            'price' => 100,
            'stock_quantity' => 0,
            'track_inventory' => true,
            'stock_status' => 'out_of_stock',
            'is_active' => true,
        ]);

        $response = $this->get(route('product.details', $product->slug));

        $response->assertStatus(200);
        $response->assertSee('Out of Stock');
        $response->assertSee('Currently Out of Stock');
    }
}
