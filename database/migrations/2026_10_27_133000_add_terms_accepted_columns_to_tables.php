<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('users') && !Schema::hasColumn('users', 'terms_accepted_at')) {
            Schema::table('users', function (Blueprint $table) {
                $table->timestamp('terms_accepted_at')->nullable()->after('updated_at');
                $table->string('terms_accepted_ip', 45)->nullable()->after('terms_accepted_at');
            });
        }

        if (Schema::hasTable('orders') && !Schema::hasColumn('orders', 'terms_accepted_at')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->timestamp('terms_accepted_at')->nullable()->after('updated_at');
                $table->string('terms_accepted_ip', 45)->nullable()->after('terms_accepted_at');
            });
        }

        if (Schema::hasTable('contacts') && !Schema::hasColumn('contacts', 'terms_accepted_at')) {
            Schema::table('contacts', function (Blueprint $table) {
                $table->timestamp('terms_accepted_at')->nullable()->after('updated_at');
                $table->string('terms_accepted_ip', 45)->nullable()->after('terms_accepted_at');
            });
        }

        if (Schema::hasTable('product_inquiries') && !Schema::hasColumn('product_inquiries', 'terms_accepted_at')) {
            Schema::table('product_inquiries', function (Blueprint $table) {
                $table->timestamp('terms_accepted_at')->nullable()->after('updated_at');
                $table->string('terms_accepted_ip', 45)->nullable()->after('terms_accepted_at');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('users') && Schema::hasColumn('users', 'terms_accepted_at')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn(['terms_accepted_at', 'terms_accepted_ip']);
            });
        }

        if (Schema::hasTable('orders') && Schema::hasColumn('orders', 'terms_accepted_at')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->dropColumn(['terms_accepted_at', 'terms_accepted_ip']);
            });
        }

        if (Schema::hasTable('contacts') && Schema::hasColumn('contacts', 'terms_accepted_at')) {
            Schema::table('contacts', function (Blueprint $table) {
                $table->dropColumn(['terms_accepted_at', 'terms_accepted_ip']);
            });
        }

        if (Schema::hasTable('product_inquiries') && Schema::hasColumn('product_inquiries', 'terms_accepted_at')) {
            Schema::table('product_inquiries', function (Blueprint $table) {
                $table->dropColumn(['terms_accepted_at', 'terms_accepted_ip']);
            });
        }
    }
};
