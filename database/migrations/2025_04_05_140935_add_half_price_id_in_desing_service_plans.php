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
        Schema::table('design_service_plans', function (Blueprint $table) {
            $table->string('stripe_half_price_id')->nullable()->after('stripe_price_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('design_service_plans', function (Blueprint $table) {
            $table->dropColumn('stripe_half_price_id');
        });
    }
};
