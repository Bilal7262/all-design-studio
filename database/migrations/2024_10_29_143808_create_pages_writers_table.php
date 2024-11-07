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
        Schema::create('pages_writers', function (Blueprint $table) {
            $table->id(); // Primary key (int) with auto-increment
            $table->string('site_name', 250)->nullable(); // Site name, nullable
            $table->string('site_url', 250)->index(); // Site URL, indexed
            $table->string('slug', 256); // Slug, non-nullable
            $table->string('name', 250)->nullable(); // Name, nullable
            $table->string('sudo_name', 250)->nullable(); // Sudo name, nullable
            $table->string('work_type', 256)->nullable(); // Work type, nullable
            $table->string('rating', 5)->nullable(); // Rating, nullable
            $table->longText('recent_review')->nullable(); // Recent review, nullable
            $table->longText('reviews')->nullable(); // Reviews, nullable
            $table->integer('total_reviews')->nullable(); // Total reviews, nullable
            $table->string('degree', 256)->nullable(); // Degree, nullable
            $table->integer('total_orders')->nullable(); // Total orders, nullable
            $table->string('writerId', 256)->nullable(); // Writer ID, nullable
            $table->longText('expertise')->nullable(); // Expertise, nullable
            $table->longText('bio')->nullable(); // Bio, nullable
            $table->string('profile_image', 256)->nullable(); // Profile image, nullable
            $table->string('profile_alt', 256)->nullable(); // Profile alt text, nullable
            $table->string('facebook', 500)->nullable(); // Facebook URL, nullable
            $table->string('instagram', 500)->nullable(); // Instagram URL, nullable
            $table->string('linkedin', 500)->nullable(); // LinkedIn URL, nullable
            $table->string('twitter', 500)->nullable(); // Twitter URL, nullable
            $table->string('meta_title', 256)->nullable(); // Meta title, nullable
            $table->longText('meta_description')->nullable(); // Meta description, nullable
            $table->dateTime('updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')); // updated_at with auto-update
            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP')); // created_at with default timestamp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages_writers');
    }
};
