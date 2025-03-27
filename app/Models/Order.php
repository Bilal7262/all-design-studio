<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Order extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(DesignService::class);
    }

    public function additionalService()
    {
        return $this->belongsTo(DesignService::class);
    }

    public function servicePlan()
    {
        return $this->belongsTo(DesignServicePlan::class);
    }

    public function files()
    {
        return $this->hasMany(OrderFile::class, 'order_id', 'id');
    }
}
