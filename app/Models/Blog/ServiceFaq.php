<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceFaq extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_page_id',
        'heading',
    ];

    public function questions()
    {
        return $this->hasMany(ServiceFaqQuestion::class, 'service_faq_id', 'id');
    }

    public function servicePage()
    {
        return $this->belongsTo(ServicePage::class, 'service_page_id', 'id');
    }
}
