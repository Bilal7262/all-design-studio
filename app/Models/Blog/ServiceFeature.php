<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_page_id', 'heading', 'sub_heading','type','order'
    ];

    public function servicePage()
    {
        return $this->belongsTo(ServicePage::class);
    }

    public function benefits()
    {
        return $this->hasMany(ServiceFeatureBenefit::class);
    }
}
