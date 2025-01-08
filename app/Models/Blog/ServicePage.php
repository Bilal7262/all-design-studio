<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePage extends Model
{
    use HasFactory;
    protected $fillable = [
        'blogger_id',
        'page_type',
        'title',
        'page_slug',
        'meta_title',
        'meta_description',
        'breadcrumb_schema',
        'site_url',
        // 'image',
        // 'image_name',
        // 'alt_text',
        'image_id',
        'desc1',
        'desc2',
        'banner_button_text',
        'banner_button_link',
        'aggregate_rating',
        'status'
    ];

    protected $hidden = ['image_id', 'image_name'];

    public function snippet()
    {
        return $this->hasOne(Snippet::class, 'service_id', 'id')->with('usps');
    }
    public function images()
    {
        return $this->hasMany(ServiceImage::class);
    }

    public function banner()
    {
        return $this->hasOne(ServiceBanner::class);
    }

    public function feature()
    {
        return $this->hasOne(ServiceFeature::class)->with('benefits')->whereNull('type');
    }

    public function feature_clone()
    {
        return $this->hasOne(ServiceFeature::class)->with('benefits')->where('type','clone');
    }

    public function orders()
    {
        return $this->hasMany(ServiceOrder::class)->with('steps')->whereNull('type');
    }    

    public function orders_clone()
    {
        return $this->hasMany(ServiceOrder::class)->with('steps')->where('type','clone');
    }

    public function sample()
    {
        return $this->hasOne(ServiceSample::class, 'service_page_id','id')->with('logos');
    }

    public function pricing()
    {
        return $this->hasOne(ServicePrice::class, 'service_page_id','id')->with('cards');
    }

    public function testimonial()
    {
        return $this->hasOne(ServiceTestimonial::class, 'service_page_id','id')->with('reviews');
    }

    public function faq()
    {
        return $this->hasOne(ServiceFaq::class, 'service_page_id','id')->with('questions');
    }

    public function seo()
    {
        return $this->hasOne(ServiceSeo::class, 'service_page_id','id');
    }

    public function cta()
    {
        return $this->hasOne(ServiceCta::class, 'service_page_id','id');
    }

    public function interlinking()
    {
        return $this->hasOne(ServiceInterlinking::class, 'service_page_id','id')->with('services');
    }

}
