<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePriceCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_price_id', 
        'heading', 
        'description', 
        'image', 
        'image_alt', 
        'price',
    ];

    /**
     * Define the relationship with the ServicePrice model.
     */
    public function price()
    {
        return $this->belongsTo(ServicePrice::class,'service_price_id','id');
    }
}
