<?php

namespace App\Models\Blogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagesUser extends Model
{
    use HasFactory;

    protected $table = 'pages_users';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role','name','password','email','mobile_number','image','info','instagram',
        'facebook','twitter','linkedin','expertise'
    ];

    /**
     * The attributes that are hidden.
     *
     * @var array
     */

    protected $hidden = [
        'updated_at'
    ];

    public function hasRole($role)
    {
        return PagesUser::where('role', $role)->get();
    }
}
