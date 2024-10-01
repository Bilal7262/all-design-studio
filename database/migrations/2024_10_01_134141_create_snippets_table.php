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
        Schema::create('snippets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_id');
            $table->string('service_type');
            $table->string('card_type');
            $table->string('heading');
            $table->string('description');
            $table->string('price');
            $table->string('icon');
            $table->string('icon_alt');
            $table->string('discount_tag');
            $table->string('site_url');
            $table->string('page_slug');
            $table->timestamps();

            $table->foreign('service_id')->references('id')->on('service_pages')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('snippets');
    }
};
