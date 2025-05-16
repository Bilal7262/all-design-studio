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
            
            $table->text('include')->nullable()->after('features');
            $table->text('plus')->nullable()->after('include');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('design_service_plans', function (Blueprint $table) {
            $table->dropColumn(['plus', 'include']);
        });
    }
};
