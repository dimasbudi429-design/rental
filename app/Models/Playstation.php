<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playstation extends Model
{
    public function bookings()
{
    return $this->hasMany(Booking::class);
}
    use HasFactory;
}
