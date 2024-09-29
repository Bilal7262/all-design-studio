<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class PageUser extends Model
{
    use HasFactory, Notifiable, HasApiTokens;

    // Allow mass assignment of these fields
    protected $fillable = [
        'name',
        'user_name',
        'password',
        'pass'
    ];

    // Protect these fields from mass assignment (if any)
    protected $guarded = [
        'id', // Assuming you don't want to allow mass assignment on 'id'
        // Add any other fields you want to guard
    ];

    // Optionally, hide the password from being returned in responses
    protected $hidden = [
        'password',
        'pass'
    ];
}
