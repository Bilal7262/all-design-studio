<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceDesignCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'desc',
        'icon',
        'alt_text',
        'service_design_id',
    ];

    public function serviceDesign()
    {
        return $this->belongsTo(ServiceDesign::class, 'service_design_id','id');
    }
}
