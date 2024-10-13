<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePrice extends Model
{
    use HasFactory;
    protected $fillable = [
        'heading', 
        'service_page_id',
    ];

    /**
     * Define the relationship with the ServicePage model.
     */
    public function servicePage()
    {
        return $this->belongsTo(ServicePage::class, 'service_page_id','id');
    }

    /**
     * Define the relationship with the ServicePriceCard model.
     */
    public function cards()
    {
        return $this->hasMany(ServicePriceCard::class,'service_price_id','id');
    }
}
