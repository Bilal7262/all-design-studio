<?php

namespace App\Models\Blogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagesTempFile extends Model
{
    use HasFactory;
    protected $table = 'pages_temp_files';
    public $timestamps = false;
    protected $fillable = [
        'name',
    ];
}
