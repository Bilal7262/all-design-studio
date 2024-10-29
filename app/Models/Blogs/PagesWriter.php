<?php

namespace App\Models\Blogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagesWriter extends Model
{
    use HasFactory;

    protected $table = 'pages_writers';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'site_name', 'site_url', 'slug', 'sudo_name', 'work_type', 'rating', 'recent_review', 'total_reviews', 'degree',
        'total_orders', 'writerId', 'expertise', 'bio', 'profile_image', 'profile_alt', 'reviews', 'meta_title', 'meta_description',
        'facebook', 'instagram', 'twitter', 'linkedin'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * The attributes that are hidden.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at'
    ];

    /**
     * Get the .
     */
    public function pages()
    {
         //return $this->hasOne('App\Models\Categories');
        return $this->belongsToMany('App\Models\Blogs\Page', 'pages_pages_writers', 'writer_id', 'page_id')->withPivot('expertise', 'main_review');
    }

    public function experts()
    {
        return $this->belongsToMany(PageExpert::class, 'page_expert_writer', 'pages_writer_id', 'page_expert_id');
    }
}
