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
        Schema::create('service_feature_benefits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_feature_id')->constrained('service_features')->onDelete('cascade');
            $table->string('heading');
            $table->string('sub_heading')->nullable();
            $table->string('icon')->nullable();
            $table->string('icon_alt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_feature_benefits');
    }
};
