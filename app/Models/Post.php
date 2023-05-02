<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function track()
    {
        return $this->belongsTo(Track::class);
    }
    
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}