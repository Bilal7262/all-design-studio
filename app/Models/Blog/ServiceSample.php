<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSample extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'heading',
        'service_page_id',
    ];

    // Relationship with ServiceSampleLogo
    public function logos()
    {
        return $this->hasMany(ServiceSampleLogo::class);
    }

    // Relationship with ServicePage
    public function servicePage()
    {
        return $this->belongsTo(ServicePage::class);
    }
}
