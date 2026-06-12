<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with([
            'user',
            'playstation'
        ])->latest()->get();

        return view(
            'admin.bookings.index',
            compact('bookings')
        );
    }

    public function show($id)
    {
        $booking = Booking::with([

            'user',

            'playstation',

            'transaction',

            'timer'

        ])->findOrFail($id);

        return view(
            'admin.bookings.detail',
            compact('booking')
        );
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);

        if($booking->transaction){

            $booking->transaction->delete();

        }

        if($booking->timer){

            $booking->timer->delete();

        }

        $booking->delete();

        return back()->with(

            'success',

            'Booking berhasil dihapus'

        );
    }
}