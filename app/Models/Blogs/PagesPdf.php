<?php

namespace App\Models\Blogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagesPdf extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'pages_pdfs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'title','file_name','page_id','url'
    ];

    public function pages()
    {
        return $this->belongsTo('App\Models\Blog\Page');
    }
}
