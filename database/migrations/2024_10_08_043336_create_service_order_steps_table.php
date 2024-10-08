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
        Schema::create('service_order_steps', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('heading');
            $table->text('description')->nullable();
            $table->foreignId('service_order_id')->constrained('service_orders')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_order_steps');
    }
};
