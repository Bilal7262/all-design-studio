<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Snippet extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'service_type',
        'card_type',
        'heading',
        'description',
        'price',
        'icon',
        'icon_alt',
        'discount_tag',
        'site_url',
        'page_slug'
    ];

    public function snippetUsps()
    {
        return $this->hasMany(SnippetUsp::class);
    }
}
