<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceFeatureBenefit extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_feature_id', 'heading', 'sub_heading', 'icon', 'icon_alt'
    ];

    public function feature()
    {
        return $this->belongsTo(ServiceFeature::class);
    }
}
