<?php

namespace App\Models\Blogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory;

    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pages';

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'blogger_id', 'writer_id', 'categories', 'page_slug', 'reviewer_id', 'read_duration', 'page_type', 'content_type', 'template_name',  'parent_id' ,'title', 'title_paragraph', 'title_slug', 'blog_heading',  'headings',  'interlink_heading', 'interlink_paragraph',
        'site_name', 'site_url', 'status', 'text', 'image', 'meta_title', 'alt_text', 'meta_description', 'writer_heading', 'writer_paragraph', 'faqs_heading', 'faq_schema', 'pdf_heading', 'pdf_paragraph', 'publishing_time', 'scheduled_publishing_time',
        'positive_feedback','negative_feedback', 'parent_slug', 'breadcrumbs', 'breadcrumbSchema', 'background_color', 'text_color', 'feature_type', 'video_url', 'redirect_url'
    ];

    /**
     * Get the blogger that has the blogs.
     */
    public function pages_users()
    {
        return $this->belongsTo('App\Models\Blogs\PagesUser','blogger_id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Blogs\Page','parent_id');
    }

    public function page_reviewer()
    {
        // return $this->belongsTo('App\Models\Blogs\Pages_Writers','reviewer_id');
        return $this->hasOne('App\Models\Blogs\PagesWriter',  'id','reviewer_id');
    }

    public function page_writer()
    {
      return $this->belongsToMany('App\Models\Blogs\PagesWriter', 'pages_pages_writers', 'page_id', 'blogger_id')->withPivot('expertise', 'main_review');
      // return $this->belongsTo('App\Models\Blogs\Pages_Writers','writer_id');
    }

    public function blogs_templates()
    {
        return $this->belongsTo('App\Models\Blogs\BlogsTemplate');
    }

    /**
     * Get the Categories for the blog.
     */
    public function blogs_categories()
    {
        return $this->belongsToMany('App\Models\Blogs\BlogsCategory', 'blogs_blogs_categories', 'blog_id', 'category_id');
        //return $this->belongsTo('App\Models\Categories','cat_id');
    }

    public function pages_writers()
    {
        return $this->belongsToMany('App\Models\Blogs\PagesWriter', 'pages_pages_writers', 'page_id', 'writer_id')->withPivot('expertise', 'main_review');
        // return $this->belongsToMany('App\Models\Blogs\Pages_Writers', 'pages_pages_writers', 'page_id', 'writer_id');
        //return $this->belongsTo('App\Models\Categories','cat_id');
    }

    public function pages_faqs(){
        return $this->hasMany('App\Models\Blogs\PagesFaqs', 'page_id','id');
    }

    public function pages_pdfs(){
        return $this->hasMany('App\Models\Blogs\PagesPdf', 'page_id','id')->orderBy('id');
    }

    public function pages_snippets(){
        return $this->hasMany('App\Models\Blogs\PagesSnippet', 'page_id','id');
    }

    public function pages_interlinks(){
        return $this->hasMany('App\Models\Blogs\PagesInterlink', 'page_id','id')->orderBy('id');
    }

}
