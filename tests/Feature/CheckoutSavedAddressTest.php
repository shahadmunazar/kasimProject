<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\Product;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CheckoutSavedAddressTest extends TestCase
{
    use RefreshDatabase;

    protected Category $category;

    protected function setUp(): void
    {
        parent::setUp();

        Setting::updateOrCreate(['key' => 'delivery_charge_enabled'], ['value' => '1']);
        Setting::updateOrCreate(['key' => 'delivery_distance_enabled'], ['value' => '0']);
        Setting::updateOrCreate(['key' => 'free_delivery_enabled'], ['value' => '0']);
        Setting::updateOrCreate(['key' => 'delivery_base_fee'], ['value' => '50']);
        Setting::updateOrCreate(['key' => 'delivery_per_km_fee'], ['value' => '5']);
        Setting::updateOrCreate(['key' => 'delivery_min_fee'], ['value' => '30']);
        Setting::updateOrCreate(['key' => 'delivery_max_fee'], ['value' => '300']);
        Setting::updateOrCreate(['key' => 'delivery_max_distance'], ['value' => '10000']);

        $this->category = Category::create([
            'name' => 'Smart Devices',
            'slug' => 'smart-devices',
            'is_active' => true,
        ]);
    }

    public function test_authenticated_customer_sees_saved_addresses_on_checkout_page()
    {
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '9876543210'
        ]);

        $product = Product::create([
            'category_id' => $this->category->id,
            'name' => 'Test Industrial Module',
            'slug' => 'test-industrial-module',
            'price' => 1200,
            'stock_quantity' => 15,
            'track_inventory' => true,
            'is_active' => true,
        ]);

        $address1 = UserAddress::create([
            'user_id' => $user->id,
            'name' => 'John Home',
            'phone' => '9876543210',
            'address_line_1' => 'Flat 402, Sunshine Heights',
            'address_line_2' => 'Connaught Place',
            'city' => 'New Delhi',
            'state' => 'Delhi',
            'zip' => '110001',
            'is_default' => true,
        ]);

        $address2 = UserAddress::create([
            'user_id' => $user->id,
            'name' => 'John Office',
            'phone' => '9876543211',
            'address_line_1' => 'Plot 55, Cyber City',
            'address_line_2' => 'Sector 29',
            'city' => 'Gurugram',
            'state' => 'Haryana',
            'zip' => '122002',
            'is_default' => false,
        ]);

        $response = $this->actingAs($user)->get(route('checkout.index', $product->id));

        $response->assertStatus(200);
        $response->assertSee('Saved Addresses');
        $response->assertSee('John Home');
        $response->assertSee('Flat 402, Sunshine Heights');
        $response->assertSee('John Office');
        $response->assertSee('Plot 55, Cyber City');
        $response->assertSee('+ Deliver to a Different Address');
        $response->assertSee('Default');
    }

    public function test_guest_user_sees_login_prompt_for_saved_addresses()
    {
        $product = Product::create([
            'category_id' => $this->category->id,
            'name' => 'Test Industrial Module',
            'slug' => 'test-industrial-module',
            'price' => 1200,
            'stock_quantity' => 15,
            'track_inventory' => true,
            'is_active' => true,
        ]);

        $response = $this->get(route('checkout.index', $product->id));

        $response->assertStatus(200);
        $response->assertSee('Already have saved addresses?');
        $response->assertSee('Sign in');
        $response->assertDontSee('+ Deliver to a Different Address');
    }

    public function test_calculate_delivery_with_saved_address_id()
    {
        $user = User::factory()->create();
        $address = UserAddress::create([
            'user_id' => $user->id,
            'name' => 'Warehouse Point',
            'phone' => '9876543210',
            'address_line_1' => 'Connaught Place',
            'city' => 'New Delhi',
            'state' => 'Delhi',
            'zip' => '110001',
            'is_default' => true,
        ]);

        $response = $this->actingAs($user)->postJson(route('checkout.calculate_delivery'), [
            'address_id' => $address->id,
            'subtotal' => 1200
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'success',
            'charge'
        ]);
        $this->assertTrue($response->json('success'));
    }

    public function test_calculate_delivery_with_new_address_manual_fields()
    {
        $response = $this->postJson(route('checkout.calculate_delivery'), [
            'address_id' => 'new',
            'address' => 'Sector 62',
            'city' => 'Noida',
            'state' => 'Uttar Pradesh',
            'pincode' => '201301',
            'subtotal' => 1500
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'success',
            'charge'
        ]);
        $this->assertTrue($response->json('success'));
    }

    public function test_checkout_store_with_saved_address_creates_order()
    {
        Storage::fake('public');

        $user = User::factory()->create([
            'name' => 'Alice Customer',
            'phone' => '9988776655'
        ]);

        $product = Product::create([
            'category_id' => $this->category->id,
            'name' => 'Smart Controller',
            'slug' => 'smart-controller',
            'price' => 2500,
            'stock_quantity' => 10,
            'track_inventory' => true,
            'is_active' => true,
        ]);

        $address = UserAddress::create([
            'user_id' => $user->id,
            'name' => 'Alice Delivery',
            'phone' => '9988776655',
            'address_line_1' => 'Tower 3, Apt 12B, Central Greens',
            'address_line_2' => 'MG Road',
            'city' => 'Bengaluru',
            'state' => 'Karnataka',
            'zip' => '560001',
            'is_default' => true,
        ]);

        $fakeScreenshot = UploadedFile::fake()->image('payment.jpg');

        $response = $this->actingAs($user)->post(route('checkout.store', $product->id), [
            'address_id' => $address->id,
            'customer_name' => 'Alice Delivery',
            'mobile' => '9988776655',
            'email' => 'alice@example.com',
            'address' => 'Tower 3, Apt 12B, Central Greens, MG Road',
            'city' => 'Bengaluru',
            'state' => 'Karnataka',
            'pincode' => '560001',
            'transaction_id' => 'TXN-99882233',
            'utr_number' => 'UTR123456789',
            'payment_amount' => 2550,
            'payment_date' => now()->toDateString(),
            'payment_screenshot' => $fakeScreenshot,
            'confirmation' => '1',
            'quantity' => 1
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('orders', [
            'user_id' => $user->id,
            'customer_name' => 'Alice Delivery',
            'city' => 'Bengaluru',
            'pincode' => '560001',
            'transaction_id' => 'TXN-99882233',
        ]);
    }

    public function test_checkout_store_with_new_address_and_save_new_address_creates_user_address()
    {
        Storage::fake('public');

        $user = User::factory()->create([
            'name' => 'Bob Builder',
            'phone' => '9123456780'
        ]);

        $product = Product::create([
            'category_id' => $this->category->id,
            'name' => 'Relay Module',
            'slug' => 'relay-module',
            'price' => 800,
            'stock_quantity' => 20,
            'track_inventory' => true,
            'is_active' => true,
        ]);

        $fakeScreenshot = UploadedFile::fake()->image('payment.png');

        $response = $this->actingAs($user)->post(route('checkout.store', $product->id), [
            'address_id' => 'new',
            'save_new_address' => '1',
            'customer_name' => 'Bob Office',
            'mobile' => '9123456780',
            'email' => 'bob@example.com',
            'address' => 'Unit 10, Industrial Park',
            'city' => 'Pune',
            'state' => 'Maharashtra',
            'pincode' => '411001',
            'transaction_id' => 'TXN-BOB-001',
            'utr_number' => 'UTR987654321',
            'payment_amount' => 850,
            'payment_date' => now()->toDateString(),
            'payment_screenshot' => $fakeScreenshot,
            'confirmation' => '1',
            'quantity' => 1
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        // Check that address was saved in user_addresses table
        $this->assertDatabaseHas('user_addresses', [
            'user_id' => $user->id,
            'name' => 'Bob Office',
            'city' => 'Pune',
            'state' => 'Maharashtra',
            'zip' => '411001',
        ]);
    }
}
