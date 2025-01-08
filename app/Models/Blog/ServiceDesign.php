<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceDesign extends Model
{
    use HasFactory;

    protected $fillable = [
        'heading',
        'sub_heading',
        'button_text',
        'button_link',
        'order',
        'service_page_id',
    ];

    // Relationship with ServicePage
    public function servicePage()
    {
        return $this->belongsTo(ServicePage::class, 'service_page_id','id');
    }

    public function categories()
    {
        return $this->hasMany(ServiceDesignCategory::class, 'service_design_id','id');
    }


}
