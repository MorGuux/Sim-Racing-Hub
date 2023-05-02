<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function favourite_car()
    {
        return $this->belongsTo(Car::class);
    }

    public function favourite_track()
    {
        return $this->belongsTo(Track::class);
    }
}