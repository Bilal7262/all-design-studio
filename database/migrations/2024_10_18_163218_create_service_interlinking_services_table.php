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
        Schema::create('service_interlinking_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_interlinking_id')->constrained()->onDelete('cascade');
            $table->string('text');
            $table->text('link');
            $table->string('image')->nullable();
            $table->string('image_alt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_interlinking_services');
    }
};