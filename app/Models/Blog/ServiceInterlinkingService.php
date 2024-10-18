<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceInterlinkingService extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_interlinking_id', 
        'text', 
        'link', 
        'image', 
        'image_alt'
    ];

    /**
     * Define the relationship with ServiceInterlinking.
     */
    public function interlinking()
    {
        return $this->belongsTo(ServiceInterlinking::class);
    }
}
