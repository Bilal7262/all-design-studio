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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('service');
            $table->string('additional_service');
            $table->integer('delivery');
            $table->integer('price');
            $table->string('purpose');
            $table->string('color_preference');
            $table->string('brand_name');
            $table->string('size');
            $table->string('body_text');
            $table->string('design_usage');
            $table->string('file_format');
            $table->string('description');
            $table->string('inspiration');
            $table->string('font');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
