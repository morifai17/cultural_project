<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['library_id', 'title', 'author' ];

    public function library() { return $this->belongsTo(Library::class); }
}
