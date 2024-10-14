<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceFaqQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_faq_id',
        'text',
        'answer',
    ];

    public function faq()
    {
        return $this->belongsTo(ServiceFaq::class, 'service_faq_id', 'id');
    }
}
