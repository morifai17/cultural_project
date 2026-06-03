<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theater extends Model
{
    // الحقول التي نسمح بملئها جماعياً
    protected $fillable = [
        'cultural_center_id', 
        'name', 
        'capacity', 
        'description'
    ];

    public function culturalCenter() 
    { 
        return $this->belongsTo(CulturalCenter::class); 
    }

    public function activities() 
    { 
        return $this->hasMany(Activity::class); 
    }

    public function reservations() 
    { 
        return $this->hasMany(Reservation::class); 
    }
    public function suggestions()
{
    return $this->morphMany(Suggestion::class, 'suggestable');
}
}