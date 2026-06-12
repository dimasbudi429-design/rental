<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Booking;
use App\Models\User;
use App\Models\Playstation;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBooking = Booking::count();

        $totalUser = User::where(
            'role',
            'user'
        )->count();

        $totalPs = Playstation::count();

        $totalPendapatan = Transaction::where(
            'payment_status',
            'paid'
        )->sum('total_price');

        return view(
            'admin.dashboard',
            compact(

                'totalBooking',

                'totalUser',

                'totalPs',

                'totalPendapatan'

            )
        );
    }
}