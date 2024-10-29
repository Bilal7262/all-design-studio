<?php

namespace App\Models\Blogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagesInterlink extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'pages_interlinks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'url','text','page_id'
    ];

    public function pages()
    {
        return $this->belongsTo('App\Models\Blog\Page');
    }
}
