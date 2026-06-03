<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['user_id', 'admin_id', 'title', 'message', 'is_read'];

    public function user() { return $this->belongsTo(User::class); }
    
    public function admin() { return $this->belongsTo(Admin::class); }
  
    public function notifiable() { return $this->morphTo(); }
}

