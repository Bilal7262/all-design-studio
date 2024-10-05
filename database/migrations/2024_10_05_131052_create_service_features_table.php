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
        Schema::create('service_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_page_id')->constrained('service_pages')->onDelete('cascade');
            $table->string('heading');
            $table->string('sub_heading')->nullable();
            $table->string('feature1')->nullable();
            $table->string('feature2')->nullable();
            $table->string('feature3')->nullable();
            $table->string('feature4')->nullable();
            $table->decimal('price', 8, 2)->nullable(); // adjust precision/scale if needed
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_features');
    }
};
