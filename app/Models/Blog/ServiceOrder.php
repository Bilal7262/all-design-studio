<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'heading', 'sub_heading', 'button_text', 'button_link', 'service_page_id','type','order'
    ];

    public function steps()
    {
        return $this->hasMany(ServiceOrderStep::class);
    }
    public function servicePage()
    {
        return $this->belongsTo(ServicePage::class);
    }
}
