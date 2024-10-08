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
        return $this->hasOne(ServiceFeature::class)->with('benefits');
    }

    public function orders()
    {
        return $this->hasMany(ServiceOrder::class)->with('steps');
    }

}
