<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Transaction;
use App\Models\Timer;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with([
            'booking.user',
            'booking.playstation'
        ])->latest()->get();

        return view(
            'admin.transactions.index',
            compact('transactions')
        );
    }

    public function verify($id)
    {
        $transaction = Transaction::findOrFail($id);

        $transaction->update([

            'payment_status' => 'paid'

        ]);

        $booking = $transaction->booking;

        $booking->update([

            'status' => 'active'

        ]);

        Timer::create([

            'booking_id' => $booking->id,

            'start_time' => now(),

            'end_time' => now()->addHours(
                $booking->duration
            ),

            'remaining_time' =>
                $booking->duration * 3600,

            'status' => 'running'

        ]);

        return back()->with(

            'success',

            'Pembayaran berhasil diverifikasi'

        );
    }
}