<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('mobile');
            $table->string('email')->nullable();
            $table->text('address');
            $table->string('city');
            $table->string('state');
            $table->string('pincode');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->integer('quantity')->default(1);
            $table->decimal('amount', 10, 2);
            $table->string('payment_method')->default('QR');
            $table->string('transaction_id')->nullable();
            $table->string('utr_number')->nullable();
            $table->decimal('payment_amount', 10, 2)->nullable();
            $table->date('payment_date')->nullable();
            $table->string('payment_screenshot')->nullable();
            $table->boolean('is_confirmed')->default(false);
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
