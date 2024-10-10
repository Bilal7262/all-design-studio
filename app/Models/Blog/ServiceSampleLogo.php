<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSampleLogo extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_sample_id',
        'category_id',
        'image',
        'image_alt',
        'name',
    ];

    // Relationship with ServiceSample
    public function sample()
    {
        return $this->belongsTo(ServiceSample::class, 'service_sample_id');
    }

    // Relationship with LogoCategory (assuming logo categories are in `service_sample_categories`)
    public function category()
    {
        return $this->belongsTo(ServiceSampleCategory::class, 'category_id');
    }
}
