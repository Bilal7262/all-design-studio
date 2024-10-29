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
        Schema::create('pages_interlinks', function (Blueprint $table) {
            $table->id(); // Primary key (bigint) with auto-increment
            $table->unsignedBigInteger('page_id')->index(); // Foreign key (page_id) with index
            $table->longText('question')->nullable(); // Question field with utf8mb4_general_ci collation
            $table->longText('answer')->nullable(); // Answer field with utf8mb4_general_ci collation
            $table->longText('answerPlain')->nullable(); // Plain text answer field with utf8mb4_general_ci
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP')); // created_at with default current timestamp

            // Foreign key constraint
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages_interlinks');
    }
};
