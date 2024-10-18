<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCta extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_page_id',
        'heading',
        'button_text',
        'button_link'
    ];

    // Relationship with ServicePage
    public function servicePage()
    {
        return $this->belongsTo(ServicePage::class, 'service_page_id','id');
    }
}
