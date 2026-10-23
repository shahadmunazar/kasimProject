<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('delivery_personnel', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('employee_code', 50)->unique();
            $table->string('vehicle_type', 50)->nullable();
            $table->string('vehicle_number', 50)->nullable();
            $table->string('license_number', 100)->nullable();
            $table->string('emergency_contact', 30)->nullable();
            $table->boolean('is_available')->default(true)->index();
            $table->decimal('current_latitude', 10, 7)->nullable();
            $table->decimal('current_longitude', 10, 7)->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->string('shipment_number', 50)->unique();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $table->foreignId('warehouse_id')->constrained('warehouses')->cascadeOnDelete();
            $table->string('delivery_type', 30)->default('manual')->index(); // manual, courier
            $table->foreignId('delivery_personnel_id')->nullable()->constrained('delivery_personnel')->nullOnDelete();
            $table->string('courier_code', 50)->nullable(); // shiprocket, delhivery, custom
            $table->string('courier_name', 100)->nullable();
            $table->string('awb_number', 100)->nullable()->index();
            $table->string('tracking_number', 100)->nullable()->index();
            $table->text('tracking_url')->nullable();
            $table->text('label_url')->nullable();
            $table->string('status', 40)->default('pending')->index(); // pending, packed, ready_for_pickup, shipped, in_transit, out_for_delivery, delivered, delivery_failed, return_initiated, returned_to_sender
            $table->dateTime('pickup_scheduled_at')->nullable();
            $table->dateTime('shipped_at')->nullable();
            $table->dateTime('delivered_at')->nullable();
            $table->date('estimated_delivery_date')->nullable();
            $table->string('recipient_name', 150)->nullable();
            $table->string('proof_signature')->nullable();
            $table->string('proof_photo')->nullable();
            $table->text('delivery_notes')->nullable();
            $table->timestamps();
        });

        Schema::create('shipment_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shipment_id')->constrained('shipments')->cascadeOnDelete();
            $table->foreignId('order_item_id')->nullable()->constrained('order_items')->nullOnDelete();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            $table->integer('quantity');
            $table->timestamps();
        });

        Schema::create('shipment_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shipment_id')->constrained('shipments')->cascadeOnDelete();
            $table->string('status', 50)->index();
            $table->string('location', 150)->nullable();
            $table->text('description')->nullable();
            $table->string('source', 50)->default('system'); // system, admin, delivery_app, courier_webhook
            $table->dateTime('event_timestamp');
            $table->json('metadata')->nullable();
            $table->timestamps();

            $table->index(['shipment_id', 'event_timestamp']);
        });

        Schema::create('delivery_attempts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shipment_id')->constrained('shipments')->cascadeOnDelete();
            $table->foreignId('attempted_by')->nullable()->constrained('users')->nullOnDelete();
            $table->integer('attempt_number')->default(1);
            $table->string('status', 30); // delivered, failed, rescheduled
            $table->string('failure_reason', 150)->nullable();
            $table->date('rescheduled_date')->nullable();
            $table->string('recipient_name', 150)->nullable();
            $table->string('proof_photo')->nullable();
            $table->text('notes')->nullable();
            $table->dateTime('attempted_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_attempts');
        Schema::dropIfExists('shipment_events');
        Schema::dropIfExists('shipment_items');
        Schema::dropIfExists('shipments');
        Schema::dropIfExists('delivery_personnel');
    }
};
