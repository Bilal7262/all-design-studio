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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_page_id'); // Foreign key to service_pages
            $table->binary('image'); // Store the image in binary format
            $table->string('image_alt')->nullable(); // Alt text for the image
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('service_page_id')->references('id')->on('service_pages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_images');
    }
};
