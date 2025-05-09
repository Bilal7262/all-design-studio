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
        Schema::table('design_services', function (Blueprint $table) {
            $table->string('heading')->after('label')->nullable(); // Add heading, nullable for safety
            $table->string('stripe_product_id')->after('heading')->nullable(); // Add stripe_product_id, nullable
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('design_services', function (Blueprint $table) {
            $table->dropColumn('heading');
            $table->dropColumn('stripe_product_id');
        });
    }
};
