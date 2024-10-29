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
        Schema::create('pages_users', function (Blueprint $table) {
            $table->id(); // Primary key (int) with auto-increment
            $table->string('role', 20)->default('Blogger'); // Role with default value 'Blogger'
            $table->string('name', 250)->nullable(); // Name, nullable
            $table->string('expertise', 250)->nullable(); // Expertise, nullable
            $table->string('email', 250)->nullable(); // Email, nullable
            $table->string('password', 250)->nullable(); // Password, nullable
            $table->string('mobile_number', 20)->nullable(); // Mobile number, nullable
            $table->string('image', 250)->nullable(); // Image path, nullable
            $table->longText('info')->nullable(); // Info, nullable
            $table->string('facebook', 250)->nullable(); // Facebook profile link, nullable
            $table->string('instagram', 250)->nullable(); // Instagram profile link, nullable
            $table->string('linkedin', 250)->nullable(); // LinkedIn profile link, nullable
            $table->string('twitter', 250)->nullable(); // Twitter profile link, nullable
            $table->tinyInteger('status')->default(1); // Status, default value 1 (active)
            $table->dateTime('deleted_at')->nullable(); // Soft delete field
            $table->timestamps(); // created_at and updated_at

            // Indexes and Constraints (if needed)
            $table->unique('email', 'unique_user_email'); // Optional: Enforce unique emails
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages_users');
    }
};
