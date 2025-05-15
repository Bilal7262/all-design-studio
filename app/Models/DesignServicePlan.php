<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignServicePlan extends Model
{
    use HasFactory;

    protected $fillable = ['design_service_id', 'duration_days', 'price', 'features','include','plus'];

    public function service()
    {
        return $this->belongsTo(DesignService::class);
    }
}
