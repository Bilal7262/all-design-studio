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
            $table->string('name')->after('design_service_id')->nullable(); // Add name, nullable for safety
            $table->string('label')->after('name')->nullable(); // Add label, nullable for safety
            $table->string('currency')->after('price')->nullable(); // Add currency, nullable for safety
            $table->string('symbol')->after('currency')->nullable(); // Add symbol, nullable for safety
            // $table->foreign('design_service_id')->references('id')->on('design_services')->onDelete('cascade'); // Add foreign key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('design_service_plans', function (Blueprint $table) {
            // $table->dropForeign(['design_service_id']);
            $table->dropColumn('name');
            $table->dropColumn('label');
            $table->dropColumn('currency');
            $table->dropColumn('symbol');
        });
    }
};
