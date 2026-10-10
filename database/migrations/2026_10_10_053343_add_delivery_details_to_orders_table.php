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
        Schema::table('orders', function (Blueprint $table) {
            $table->decimal('delivery_distance_km', 8, 2)->nullable()->after('payment_method');
            $table->decimal('delivery_charge', 10, 2)->default(0)->after('delivery_distance_km');
            $table->decimal('base_delivery_charge', 10, 2)->nullable()->after('delivery_charge');
            $table->decimal('per_km_rate', 10, 2)->nullable()->after('base_delivery_charge');
            $table->string('free_delivery_reason')->nullable()->after('per_km_rate');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'delivery_distance_km',
                'delivery_charge',
                'base_delivery_charge',
                'per_km_rate',
                'free_delivery_reason'
            ]);
        });
    }
};
