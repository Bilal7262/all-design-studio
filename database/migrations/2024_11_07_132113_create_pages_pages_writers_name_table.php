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
        Schema::create('pages_pages_writers_name', function (Blueprint $table) {
            $table->id(); // id, Primary key with auto-increment
            $table->bigInteger('page_id')->index(); // page_id, indexed, not nullable
            $table->bigInteger('writer_id')->nullable()->index(); // writer_id, indexed, nullable
            $table->bigInteger('blogger_id')->nullable()->index(); // blogger_id, indexed, nullable
            $table->bigInteger('reviewer_id')->nullable(); // reviewer_id, nullable
            $table->string('expertise', 256)->nullable(); // expertise, varchar(256), nullable
            $table->bigInteger('main_review')->nullable(); // main_review, nullable
            $table->timestamp('created_at')->useCurrent(); // created_at, default to current timestamp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages_pages_writers_name');
    }
};
