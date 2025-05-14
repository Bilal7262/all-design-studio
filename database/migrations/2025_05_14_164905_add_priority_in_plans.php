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
            $table->integer('priority')->default(0)->after('features');
            // Adding a default value of 0 for the priority column
            // This ensures that existing records will have a priority of 0
            // unless specified otherwise.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('design_service_plans', function (Blueprint $table) {
            $table->dropColumn('priority');
            // Dropping the priority column if it exists
            // This is important for maintaining the integrity of the database
            // and ensuring that no unnecessary columns are left behind.
        });
    }
};
