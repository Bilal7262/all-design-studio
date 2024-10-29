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
        Schema::create('pages_pdfs', function (Blueprint $table) {
            $table->id(); // Primary key (bigint) with auto-increment
            $table->unsignedBigInteger('page_id')->nullable()->index(); // Foreign key with index, nullable
            $table->string('file_name', 500)->nullable(); // File name with latin1_swedish_ci collation
            $table->longText('title')->nullable(); // Title with latin1_swedish_ci collation
            $table->string('url', 500)->nullable(); // URL with latin1_swedish_ci collation
            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP')); // created_at with default timestamp

            // Foreign key constraint
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages_pdfs');
    }
};
