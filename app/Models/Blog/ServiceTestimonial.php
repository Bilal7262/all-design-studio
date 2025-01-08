<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceTestimonial extends Model
{
    use HasFactory;protected $fillable = [
        'service_page_id', 'heading', 'sub_heading','order'
    ];

    /**
     * Get the reviews for the service testimonial.
     */
    public function reviews()
    {
        return $this->hasMany(ServiceTestimonialReview::class , 'service_testimonial_id','id');
    }

    /**
     * Get the service page associated with the testimonial.
     */
    public function servicePage()
    {
        return $this->belongsTo(ServicePage::class, 'service_page_id','id');
    }
}
