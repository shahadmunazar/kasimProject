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
            $table->string('courier_name', 100)->nullable()->after('delivery_type');
            $table->string('tracking_id', 100)->nullable()->after('courier_name');
            $table->text('tracking_url')->nullable()->after('tracking_id');
            $table->dateTime('shipped_at')->nullable()->after('tracking_url');
            $table->string('delivery_status', 40)->default('processing')->after('shipped_at');
        });

        Schema::table('shipments', function (Blueprint $table) {
            $table->foreignId('warehouse_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'courier_name',
                'tracking_id',
                'tracking_url',
                'shipped_at',
                'delivery_status',
            ]);
        });

        Schema::table('shipments', function (Blueprint $table) {
            $table->foreignId('warehouse_id')->nullable(false)->change();
        });
    }
};
