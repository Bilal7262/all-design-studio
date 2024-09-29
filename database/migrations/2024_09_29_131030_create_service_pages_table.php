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
        Schema::create('service_pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blogger_id');
            $table->string('page_type');
            $table->string('title');
            $table->string('page_slug');
            $table->string('meta_title');
            $table->text('meta_description')->nullable();
            $table->text('breadcrumb_schema')->nullable();
            // $table->string('image')->nullable();
            // $table->string('image_name')->nullable();
            // $table->string('alt_text')->nullable();
            $table->unsignedBigInteger('image_id')->nullable();
            $table->text('desc1')->nullable();
            $table->text('desc2')->nullable();
            $table->string('banner_button_text')->nullable();
            $table->string('banner_button_link')->nullable();
            $table->float('aggregate_rating')->nullable();
            $table->string('status')->default('inactive');
            $table->timestamps();

            // Foreign key constraint for blogger_id (assuming it references an existing table)
            $table->foreign('blogger_id')->references('id')->on('bloggers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_pages');
    }
};
