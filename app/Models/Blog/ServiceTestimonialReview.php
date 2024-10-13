<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceTestimonialReview extends Model
{
    use HasFactory;


    protected $fillable = [
        'service_testimonial_id', 'name', 'occupation', 'text'
    ];

    /**
     * Get the service testimonial that owns the review.
     */
    public function serviceTestimonial()
    {
        return $this->belongsTo(ServiceTestimonial::class);
    }
}
