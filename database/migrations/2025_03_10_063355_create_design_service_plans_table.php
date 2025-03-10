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
        Schema::create('design_service_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('design_service_id')->constrained()->onDelete('cascade');
            $table->integer('duration_days'); // e.g., 1, 3, 7, 30 (for 1 month), etc.
            $table->float('price'); // e.g., 210, 160, etc.
            $table->text('features'); // e.g., '1 day + 5 logos + 5 revisions'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('design_service_plans');
    }
};
