<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('warehouses')) {
            Schema::create('warehouses', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('code', 50)->unique();
                $table->string('contact_name')->nullable();
                $table->string('phone', 30)->nullable();
                $table->string('email')->nullable();
                $table->text('address')->nullable();
                $table->string('city', 100)->nullable();
                $table->string('state', 100)->nullable();
                $table->string('pincode', 20)->nullable();
                $table->boolean('is_active')->default(true)->index();
                $table->boolean('is_default')->default(false)->index();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('warehouse_stocks')) {
            Schema::create('warehouse_stocks', function (Blueprint $table) {
                $table->id();
                $table->foreignId('warehouse_id')->constrained('warehouses')->cascadeOnDelete();
                $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
                $table->integer('quantity_on_hand')->default(0);
                $table->integer('quantity_reserved')->default(0);
                $table->integer('damaged_quantity')->default(0);
                $table->integer('reorder_level')->default(5);
                $table->string('location_bin', 100)->nullable();
                $table->timestamps();

                $table->unique(['warehouse_id', 'product_id']);
            });
        }

        // Seed default warehouse if none exists
        if (DB::table('warehouses')->count() === 0) {
            $warehouseId = DB::table('warehouses')->insertGetId([
                'name' => 'Main Fulfillment Hub',
                'code' => 'WH-MAIN',
                'contact_name' => 'Warehouse Manager',
                'phone' => '9876543210',
                'email' => 'warehouse@tcsmarttechnology.com',
                'address' => 'Industrial Area, Phase 1',
                'city' => 'Bengaluru',
                'state' => 'Karnataka',
                'pincode' => '110025',
                'is_active' => true,
                'is_default' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Link existing products to the default warehouse
            $products = DB::table('products')->get();
            foreach ($products as $prod) {
                DB::table('warehouse_stocks')->insert([
                    'warehouse_id' => $warehouseId,
                    'product_id' => $prod->id,
                    'quantity_on_hand' => $prod->stock_quantity ?? 10,
                    'quantity_reserved' => 0,
                    'damaged_quantity' => 0,
                    'reorder_level' => $prod->low_stock_threshold ?? 5,
                    'location_bin' => 'A1-RACK-01',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouse_stocks');
        Schema::dropIfExists('warehouses');
    }
};
