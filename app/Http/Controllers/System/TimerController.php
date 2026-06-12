<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\Timer;

class TimerController extends Controller
{
    public function remaining($booking_id)
    {
        $timer = Timer::where('booking_id', $booking_id)->first();

        $remaining = strtotime($timer->end_time) - time();

        if ($remaining <= 0) {
            $timer->update(['status' => 'finished']);
            return response()->json(['remaining' => 0]);
        }

        return response()->json(['remaining' => $remaining]);
    }
}