<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = ['name'];

    public function notifications() 
    { 
        return $this->hasMany(Notification::class); 
    }
}