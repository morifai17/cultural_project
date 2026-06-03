<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CulturalCenter extends Model
{
    protected $fillable = ['name', 'location', 'description'];

    public function theaters() { return $this->hasMany(Theater::class); }
    public function halls() { return $this->hasMany(Hall::class); }
    public function libraries() { return $this->hasMany(Library::class); }
    public function activities() { return $this->hasMany(Activity::class); }
    public function volunteerings() { return $this->hasMany(Volunteering::class); }
    public function suggestions()
{
    return $this->morphMany(Suggestion::class, 'suggestable');
}
}
