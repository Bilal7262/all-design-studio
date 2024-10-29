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
        Schema::create('pages_temp_files', function (Blueprint $table) {
            $table->id(); // Primary key (bigint) with auto-increment
            $table->string('file_path', 256)->nullable(); // File path with latin1_swedish_ci collation
            $table->string('name', 256); // Name with latin1_swedish_ci collation (non-nullable)
            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP')); // created_at with default timestamp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages_temp_files');
    }
};
