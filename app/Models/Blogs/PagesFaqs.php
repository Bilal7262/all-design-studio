<?php

namespace App\Models\Blogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagesFaqs extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'pages_faqs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'question','answer','page_id', 'answerPlain'
    ];

    public function pages()
    {
        return $this->belongsTo('App\Models\Blogs\Page');
    }
}
