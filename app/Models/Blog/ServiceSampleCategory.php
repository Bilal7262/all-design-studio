<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSampleCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function logos()
    {
        return $this->hasMany(ServiceSampleLogo::class, 'category_id');
    }
}
