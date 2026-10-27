<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;

class TermsConsentDatabaseTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_registration_saves_terms_accepted_at_and_ip(): void
    {
        $response = $this->post(route('frontend.auth.register'), [
            'name' => 'Consent User',
            'email' => 'consent@example.com',
            'phone' => '9876543210',
            'password' => 'secret123',
            'agree_terms' => 1
        ]);

        $response->assertOk();
        $this->assertDatabaseHas('users', [
            'email' => 'consent@example.com',
        ]);

        $user = User::where('email', 'consent@example.com')->first();
        $this->assertNotNull($user->terms_accepted_at);
        $this->assertNotNull($user->terms_accepted_ip);
    }

    public function test_contact_form_submission_saves_terms_accepted(): void
    {
        $response = $this->postJson(route('contact.submit'), [
            'name' => 'John Contact',
            'email' => 'john@example.com',
            'mobile' => '9123456789',
            'message' => 'Interested in embedded systems engineering',
            'agree_terms' => 1
        ]);

        $response->assertOk();
        $this->assertDatabaseHas('contacts', [
            'email' => 'john@example.com',
        ]);

        $contact = \App\Models\Contact::where('email', 'john@example.com')->first();
        $this->assertNotNull($contact->terms_accepted_at);
        $this->assertNotNull($contact->terms_accepted_ip);
    }

    public function test_product_inquiry_saves_terms_accepted(): void
    {
        $cat = Category::create(['name' => 'Test Cat', 'slug' => 'test-cat', 'is_active' => 1]);
        $prod = Product::create([
            'category_id' => $cat->id,
            'name' => 'Sensor Hub',
            'slug' => 'sensor-hub',
            'is_active' => 1
        ]);

        $response = $this->post(route('products.inquiry'), [
            'product_id' => $prod->id,
            'name' => 'Inquiry Buyer',
            'phone' => '9988776655',
            'email' => 'buyer@example.com',
            'message' => 'Need 50 units for factory',
            'agree_terms' => 1
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('product_inquiries', [
            'name' => 'Inquiry Buyer',
            'phone' => '9988776655',
        ]);

        $inquiry = \App\Models\ProductInquiry::where('name', 'Inquiry Buyer')->first();
        $this->assertNotNull($inquiry->terms_accepted_at);
        $this->assertNotNull($inquiry->terms_accepted_ip);
    }

    public function test_appointment_store_saves_terms_accepted(): void
    {
        $response = $this->post(route('appointment.store'), [
            'name' => 'Doctor Clinic',
            'email' => 'clinic@example.com',
            'mobile' => '9876543211',
            'service' => 'Medical Device Development',
            'message' => 'Requesting consultation',
            'agree_terms' => 1
        ]);

        $response->assertRedirect();
        $contact = \App\Models\Contact::where('email', 'clinic@example.com')->first();
        $this->assertNotNull($contact);
        $this->assertNotNull($contact->terms_accepted_at);
        $this->assertNotNull($contact->terms_accepted_ip);
    }
}
