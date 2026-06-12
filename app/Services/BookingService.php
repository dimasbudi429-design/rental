<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\Transaction;
use App\Models\Playstation;
use App\Models\Timer;

use Carbon\Carbon;

class BookingService
{
    public function createBooking($data)
    {
        $playstation = Playstation::findOrFail(
            $data['playstation_id']
        );

        $start = Carbon::now();

        $end = Carbon::now()->addHours(
            $data['duration']
        );

        $total =
            $playstation->price_per_hour *
            $data['duration'];

        $booking = Booking::create([

            'user_id' => auth()->id(),

            'playstation_id' =>
                $data['playstation_id'],

            'start_time' => $start,

            'end_time' => $end,

            'duration' => $data['duration'],

            'status' => 'pending'

        ]);

        Transaction::create([

            'booking_id' => $booking->id,

            'total_price' => $total,

            'payment_status' => 'unpaid'

        ]);

        Timer::create([

            'booking_id' => $booking->id,

            'start_time' => $start,

            'end_time' => $end,

            'remaining_time' =>
                $data['duration'] * 3600,

            'status' => 'running'

        ]);

        return $booking;
    }
}