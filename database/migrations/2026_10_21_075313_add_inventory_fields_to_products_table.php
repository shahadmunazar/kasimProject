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
        Schema::table('products', function (Blueprint $table) {
            $table->string('sku', 100)->nullable()->unique()->after('slug');
            $table->string('barcode', 100)->nullable()->index()->after('sku');
            $table->decimal('cost_price', 10, 2)->nullable()->after('offer_price');
            $table->integer('stock_quantity')->default(0)->after('cost_price');
            $table->integer('low_stock_threshold')->default(5)->after('stock_quantity');
            $table->boolean('track_inventory')->default(true)->after('low_stock_threshold');
            $table->string('stock_status', 30)->default('in_stock')->after('track_inventory');
        });

        // Backfill SKUs and seed starting stock for existing products
        $products = DB::table('products')->orderBy('id')->get();
        foreach ($products as $product) {
            $sku = 'TC-' . strtoupper(substr(preg_replace('/[^a-zA-Z0-9]/', '', $product->slug ?? $product->name), 0, 8)) . '-' . str_pad($product->id, 3, '0', STR_PAD_LEFT);
            DB::table('products')->where('id', $product->id)->update([
                'sku' => $sku,
                'stock_quantity' => 10, // give existing products initial stock
                'cost_price' => $product->price ? round($product->price * 0.7, 2) : 0,
                'stock_status' => 'in_stock',
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'sku',
                'barcode',
                'cost_price',
                'stock_quantity',
                'low_stock_threshold',
                'track_inventory',
                'stock_status',
            ]);
        });
    }
};
