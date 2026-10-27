<?php

use Illuminate\Database\Migrations\Migration;
use App\Services\FlagshipProductService;

return new class extends Migration
{
    public function up(): void
    {
        FlagshipProductService::ensureIndustrialIotMonitoringProduct();
    }

    public function down(): void
    {
        // Keep data intact on rollbacks
    }
};
