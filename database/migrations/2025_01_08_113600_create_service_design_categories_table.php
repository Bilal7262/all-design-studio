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
        Schema::create('service_design_categories', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('name'); // Category Name
            $table->text('desc')->nullable(); // Category Description
            $table->binary('icon')->nullable(); // Icon in binary format
            $table->string('alt_text')->nullable(); // Alt Text for the icon
            $table->unsignedBigInteger('service_design_id'); // Foreign Key
            $table->timestamps();

            // Adding the foreign key constraint
            $table->foreign('service_design_id')
                  ->references('id')
                  ->on('service_designs')
                  ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_design_categories');
    }
};
