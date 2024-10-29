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
        Schema::create('pages', function (Blueprint $table) {
            $table->id(); // id column with auto increment
            $table->unsignedInteger('blogger_id')->nullable()->index()->comment("Id of the blog's writer from 'blogs_users' TBL");
            $table->unsignedBigInteger('writer_id')->nullable();
            $table->unsignedBigInteger('reviewer_id')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable()->index();
            $table->string('parent_slug', 256)->nullable()->index();
            $table->string('title', 255)->nullable();
            $table->string('feature_type', 256)->default('image');
            $table->longText('video_url')->nullable();
            $table->longText('title_paragraph')->nullable();
            $table->string('title_slug', 255)->nullable();
            $table->longText('headings')->nullable();
            $table->string('site_name', 256)->nullable();
            $table->string('site_url', 256)->nullable();
            $table->string('categories', 256)->nullable();
            $table->string('blog_heading', 256)->nullable();
            $table->string('page_type', 256)->nullable()->index();
            $table->string('content_type', 256)->nullable();
            $table->string('template_name', 256)->nullable();
            $table->string('page_slug', 256)->nullable()->index();
            $table->string('writer_heading', 256)->nullable();
            $table->longText('writer_paragraph')->nullable();
            $table->string('faqs_heading', 256)->nullable();
            $table->longText('faq_schema')->nullable();
            $table->string('pdf_heading', 500)->nullable();
            $table->longText('pdf_paragraph')->nullable();
            $table->string('interlink_heading', 500)->nullable();
            $table->longText('interlink_paragraph')->nullable();
            $table->text('text')->nullable();
            $table->string('image', 255)->nullable();
            $table->mediumText('pdfs')->nullable();
            $table->mediumText('faqs')->nullable();
            $table->longText('alt_text')->nullable();
            $table->longText('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->string('read_duration', 250)->nullable();
            $table->integer('positive_feedback')->default(0);
            $table->integer('negative_feedback')->default(0);
            $table->string('instagram', 250)->nullable();
            $table->string('facebook', 250)->nullable();
            $table->string('twitter', 250)->nullable();
            $table->string('linkedin', 250)->nullable();
            $table->string('status', 20)->default('Draft');
            $table->dateTime('publishing_time')->nullable();
            $table->dateTime('scheduled_publishing_time')->nullable();
            $table->longText('page_schema')->nullable();
            $table->longText('breadcrumbSchema')->nullable();
            $table->longText('breadcrumbs')->nullable();
            $table->string('background_color', 250)->nullable();
            $table->string('text_color', 50)->nullable();
            $table->mediumText('redirect_url')->nullable();
            $table->softDeletes(); // deleted_at
            $table->timestamps(); // created_at and updated_at

            // Indexes
            $table->foreign('blogger_id')->references('id')->on('blogs_users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
