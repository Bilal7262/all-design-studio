<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceInterlinking extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_page_id', 
        'heading', 
        'sub_heading'
    ];

    /**
     * Define the relationship with ServicePage (assuming such a model exists).
     */
    public function servicePage()
    {
        return $this->belongsTo(ServicePage::class, 'service_page_id','id');
    }

    /**
     * Define the relationship with ServiceInterlinkingService.
     */
    public function services()
    {
        return $this->hasMany(ServiceInterlinkingService::class, 'service_interlinking_id','id');
    }
}
