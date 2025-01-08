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
        Schema::create('service_designs', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('heading');
            $table->string('sub_heading')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            $table->unsignedInteger('order')->default(0);
            $table->unsignedBigInteger('service_page_id'); // Foreign Key
            $table->timestamps();

            // Adding the foreign key constraint
            $table->foreign('service_page_id')
                  ->references('id')
                  ->on('service_pages')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_designs');
    }
};
