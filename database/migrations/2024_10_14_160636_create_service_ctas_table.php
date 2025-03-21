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
        Schema::create('service_ctas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_page_id')->constrained()->onDelete('cascade');
            $table->string('heading')->nullable();
            $table->string('button_text')->nullable();
            $table->text('button_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_ctas');
    }
};
