<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name', 
        'phone', 
        'password', 
        'role'
    ];

    protected $hidden = [
        'password', 
        'remember_token',
    ];


    public function notifications() 
    { 
        return $this->hasMany(Notification::class); 
    }
}