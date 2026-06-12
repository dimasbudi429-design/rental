<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\Transaction;
use App\Models\Timer;
use App\Models\Playstation;
use Carbon\Carbon;

class BookingService
{
    public function createBooking($data)
    {
        $start = Carbon::parse($data['start_time']);
        $end = $start->copy()->addHours($data['duration']);

        // 🔥 CEK BENTROK
        $conflict = Booking::where('playstation_id', $data['playstation_id'])
            ->where(function ($q) use ($start, $end) {
                $q->where('start_time', '<', $end)
                  ->where('end_time', '>', $start);
            })
            ->exists();

        if ($conflict) {
            return ['error' => 'Jadwal sudah dipakai!'];
        }

        // 💰 HITUNG HARGA
        $ps = Playstation::find($data['playstation_id']);
        $total = $ps->price_per_hour * $data['duration'];

        // 📅 SIMPAN BOOKING
        $booking = Booking::create([
            'user_id' => $data['user_id'],
            'playstation_id' => $data['playstation_id'],
            'start_time' => $start,
            'end_time' => $end,
            'duration' => $data['duration'],
            'status' => 'pending'
        ]);

        // 💵 BUAT TRANSAKSI
        Transaction::create([
            'booking_id' => $booking->id,
            'total_price' => $total,
            'payment_method' => 'transfer',
            'payment_status' => 'unpaid'
        ]);

        // ⏱️ BUAT TIMER
        Timer::create([
            'booking_id' => $booking->id,
            'start_time' => $start,
            'end_time' => $end,
            'remaining_time' => $end->timestamp - now()->timestamp,
            'status' => 'running'
        ]);

        return ['success' => 'Booking berhasil'];
    }
}