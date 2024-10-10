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
        Schema::create('service_sample_logos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_sample_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('category_id');
            $table->string('image')->nullable();
            $table->string('image_alt')->nullable();
            $table->string('name');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('service_sample_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_sample_logos');
    }
};
