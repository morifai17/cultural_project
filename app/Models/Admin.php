<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = ['name', 'phone', 'password', 'role'];
    
    // تأكد من وجود خاصية التشفير
    protected $hidden = ['password', 'remember_token'];

    public function notifications() 
    { 
        return $this->hasMany(Notification::class); 
    }
}