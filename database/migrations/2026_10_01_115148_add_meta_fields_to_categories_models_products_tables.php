<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
        });

        Schema::table('product_models', function (Blueprint $table) {
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn(['meta_title', 'meta_description']);
        });

        Schema::table('product_models', function (Blueprint $table) {
            $table->dropColumn(['meta_title', 'meta_description']);
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['meta_title', 'meta_description']);
        });
    }
};
