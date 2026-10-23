<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('payment_status', 30)->default('pending')->after('payment_method')->index();
            $table->string('delivery_type', 30)->default('manual')->after('payment_status');
            $table->string('tracking_token', 64)->nullable()->unique()->after('order_number');
            $table->text('admin_notes')->nullable()->after('free_delivery_reason');
            $table->text('cancellation_reason')->nullable()->after('admin_notes');
            $table->timestamp('cancelled_at')->nullable()->after('cancellation_reason');
        });

        // Backfill existing orders
        $orders = DB::table('orders')->get();
        foreach ($orders as $order) {
            $paymentStatus = ($order->is_confirmed || in_array($order->status, ['approved', 'dispatched'])) ? 'paid' : 'pending';
            DB::table('orders')->where('id', $order->id)->update([
                'payment_status' => $paymentStatus,
                'tracking_token' => Str::random(32),
                'order_number' => $order->order_number ?: ('ORD-' . strtoupper(Str::random(10))),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'payment_status',
                'delivery_type',
                'tracking_token',
                'admin_notes',
                'cancellation_reason',
                'cancelled_at',
            ]);
        });
    }
};
