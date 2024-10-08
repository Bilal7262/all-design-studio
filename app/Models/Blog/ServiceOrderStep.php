<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrderStep extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'heading', 'description', 'service_order_id'];

    public function serviceOrder()
    {
        return $this->belongsTo(ServiceOrder::class);
    }
}
