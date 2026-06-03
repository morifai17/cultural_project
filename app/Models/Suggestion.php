<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    protected $fillable = ['user_id', 'content', 'status', 'suggestable_id', 'suggestable_type'];

    public function user() { return $this->belongsTo(User::class); }

    // تسمح للمسؤول بمعرفة "بماذا يتعلق هذا الاقتراح؟"
    public function suggestable() { return $this->morphTo(); }
}