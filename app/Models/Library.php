<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Library extends Model 
{
    protected $fillable = ['cultural_center_id', 'name', 'details'];

    public function culturalCenter() 
    { 
        return $this->belongsTo(CulturalCenter::class); 
    }

    public function books() 
    {
        return $this->hasMany(Book::class);
    }

    public function activities() 
    {
        return $this->hasMany(Activity::class); 
    }

    public function suggestions()
    {
        return $this->morphMany(Suggestion::class, 'suggestable');
    }
}