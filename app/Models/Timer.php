<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timer extends Model
{
    public function booking()
{
    return $this->belongsTo(Booking::class);
}
    use HasFactory;
}
