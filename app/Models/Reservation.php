<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id', 'hall_id', 'theater_id', 'activity_id', 'reservation_date'
    ];

    public function user() { return $this->belongsTo(User::class); }
    public function hall() { return $this->belongsTo(Hall::class); }
    public function theater() { return $this->belongsTo(Theater::class); }
    public function activity() { return $this->belongsTo(Activity::class); }

    public function getCulturalCenterAttribute()
    {
        return $this->hall?->culturalCenter ?? $this->theater?->culturalCenter ?? null;
    }
    public function notifications() {
    return $this->morphMany(Notification::class, 'notifiable');
}
}