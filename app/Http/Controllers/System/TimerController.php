<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\Timer;
use App\Models\Booking;

class TimerController extends Controller
{
    public function remaining($booking_id)
    {
        $timer = Timer::where('booking_id', $booking_id)->first();

        if (!$timer) {
            return response()->json([
                'remaining' => 0
            ]);
        }

        $end = strtotime($timer->end_time);

        $now = time();

        $remaining = $end - $now;

        if ($remaining <= 0) {

            $remaining = 0;

            $booking = Booking::find($booking_id);

            if ($booking) {

                $booking->status = 'finished';

                $booking->save();

            }
        }

        return response()->json([
            'remaining' => $remaining
        ]);
    }
}