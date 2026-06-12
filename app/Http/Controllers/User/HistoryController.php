<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class HistoryController extends Controller
{
    public function index()
    {
        $bookings = Booking::with([
            'playstation',
            'transaction'
        ])
        ->where('user_id', auth()->id())
        ->latest()
        ->get();

        return view('user.history', compact('bookings'));
    }
}