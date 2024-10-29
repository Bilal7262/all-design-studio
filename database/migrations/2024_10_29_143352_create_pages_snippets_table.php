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
        Schema::create('pages_snippets', function (Blueprint $table) {
            $table->id(); // Primary key (bigint) with auto-increment
            $table->unsignedBigInteger('page_id')->nullable()->index(); // Foreign key to pages, indexed and nullable
            $table->string('name', 256)->nullable(); // Name with latin1_swedish_ci collation
            $table->string('type', 500)->nullable(); // Type with latin1_swedish_ci collation
            $table->longText('properties')->nullable(); // Properties in longtext, latin1_swedish_ci
            $table->longText('snippet')->nullable(); // Snippet in longtext, latin1_swedish_ci
            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP')); // created_at with default timestamp
            $table->dateTime('updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')); // updated_at with automatic update timestamp

            // Foreign key constraint
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages_snippets');
    }
};
