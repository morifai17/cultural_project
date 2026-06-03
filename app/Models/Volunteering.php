<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Volunteering extends Model
{
    protected $fillable = ['user_id', 'cultural_center_id', 'activity_id', 'status', 'notes'];

    public function user() { return $this->belongsTo(User::class); }
    public function culturalCenter() { return $this->belongsTo(CulturalCenter::class); }
    public function activity() { return $this->belongsTo(Activity::class); }

    // التطوع كـ "مُصدر" للإشعارات
    public function notifications() {
        return $this->morphMany(Notification::class, 'notifiable');
    }
}