<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timer extends Model
{
    use HasFactory;

    protected $fillable = [

        'booking_id',
        'start_time',
        'end_time',
        'remaining_time',
        'status'

    ];

    protected $casts = [

        'start_time' => 'datetime',
        'end_time' => 'datetime'

    ];

    public function booking()
    {
        return $this->belongsTo(
            Booking::class
        );
    }
}