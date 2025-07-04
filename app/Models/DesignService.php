<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class DesignService extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'label'];

    public function plans()
    {
        return $this->hasMany(DesignServicePlan::class)->orderBy('priority', 'asc');
    }
}
