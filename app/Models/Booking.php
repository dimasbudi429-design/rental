<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function user()
{
    return $this->belongsTo(User::class);
}

public function playstation()
{
    return $this->belongsTo(Playstation::class);
}

public function transaction()
{
    return $this->hasOne(Transaction::class);
}

public function timer()
{
    return $this->hasOne(Timer::class);
}
protected $fillable = [
    'user_id',
    'playstation_id',
    'start_time',
    'end_time',
    'duration',
    'status'
];
    use HasFactory;
}
