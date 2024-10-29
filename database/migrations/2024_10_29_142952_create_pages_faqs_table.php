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
        Schema::create('pages_faqs', function (Blueprint $table) {
            $table->id(); // Primary key with auto increment (bigint)
            $table->unsignedBigInteger('page_id')->index(); // Foreign key to pages
            $table->longText('question')->nullable(); // UTF-8 encoded longtext for question
            $table->longText('answer')->nullable(); // UTF-8 encoded longtext for answer
            $table->longText('answerPlain')->nullable(); // UTF-8 encoded plain answer
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP')); // Timestamp with default value

            // Indexes and Foreign Keys
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages_faqs');
    }
};
