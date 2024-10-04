<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_page_id',
        'image',      // This will now store the binary data
        'image_alt',  // Updated to reflect the new column name
    ];

    public function servicePage()
    {
        return $this->belongsTo(ServicePage::class);
    }
}
