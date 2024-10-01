<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SnippetUsp extends Model
{
    use HasFactory;

    protected $fillable = [
        'snippet_id',
        'usp'
    ];

    public function snippet()
    {
        return $this->belongsTo(Snippet::class);
    }
}
