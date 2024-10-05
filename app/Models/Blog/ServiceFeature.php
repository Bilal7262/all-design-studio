<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceFeature extends Model
{
    use HasFactory;
    use HasFactory;

    protected $fillable = [
        'heading', 
        'sub_heading', 
        'feature1', 
        'feature2', 
        'feature3', 
        'feature4', 
        'price', 
        'button_text', 
        'button_link', 
        'service_page_id'
    ];

    public function service()
    {
        return $this->belongsTo(ServicePage::class);
    }
}
