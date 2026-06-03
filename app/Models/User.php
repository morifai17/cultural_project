<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = ['name', 'email', 'password', 'admin_id'];

    // العلاقات مع الجداول الأخرى
    public function reservations() { return $this->hasMany(Reservation::class); }
    public function ratings() { return $this->hasMany(Rating::class); }
    public function notifications() { return $this->hasMany(Notification::class); }
    public function suggestions() { return $this->hasMany(Suggestion::class); }
    public function volunteerings() { return $this->hasMany(Volunteering::class); }
    
    // العلاقة مع جدول admins
    public function admin() { return $this->belongsTo(Admin::class); }
}
