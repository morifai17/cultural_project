<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['user_id', 'value', 'comment', 'rateable_id', 'rateable_type'];

    // التأكد من أن التقييم بين 1 و 5
    public function setValueAttribute($value)
    {
        $this->attributes['value'] = max(1, min(5, $value));
    }
}