<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Activity extends Model
{
    protected $fillable = [
        'cultural_center_id', 'hall_id', 'theater_id', 'title', 'description', 
        'start_time', 'end_time', 'capacity' // أضفنا الحقول الناقصة
    ];

    public function culturalCenter() { return $this->belongsTo(CulturalCenter::class); }
    public function hall() { return $this->belongsTo(Hall::class); }
    public function theater() { return $this->belongsTo(Theater::class); }

    public function reservations() { return $this->hasMany(Reservation::class); }
    
  
    public function ratings() { return $this->morphMany(Rating::class, 'rateable'); }
    
    public function notifications() { return $this->morphMany(Notification::class, 'notifiable'); }
    public function volunteerings() { return $this->hasMany(Volunteering::class); }

    public function getAverageRatingAttribute()
    {
        return $this->ratings()->avg('value') ?? 0;
    }
    public function suggestions()
{
    return $this->morphMany(Suggestion::class, 'suggestable');
}
}