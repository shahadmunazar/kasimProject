<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Product;

class FlagshipProductAvailabilityTest extends TestCase
{
    use RefreshDatabase;

    public function test_industrial_iot_monitoring_product_page_loads_and_self_heals(): void
    {
        // Even if temporarily deleted or absent from DB:
        Product::where('slug', 'industrial-iot-monitoring-product')->delete();

        $response = $this->get('/product/industrial-iot-monitoring-product');
        $response->assertOk();
        $response->assertSee('Industrial IoT Monitoring Product');
        $response->assertSee('Config 01');

        $this->assertDatabaseHas('products', [
            'slug' => 'industrial-iot-monitoring-product',
            'is_active' => 1
        ]);
    }

    public function test_features_teams_and_testimonials_routes(): void
    {
        $this->get('/features')->assertOk();
        $this->get('/teams')->assertOk();
        $this->get('/testimonials')->assertOk();
        $this->get('/services/embedded-systems')->assertRedirect('/services/embedded-systems-solutions');
    }
}
