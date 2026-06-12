<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Playstation;
use App\Models\Booking;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $total_ps = Playstation::count();

        $today_booking = Booking::whereDate('created_at', today())->count();

        $income = Transaction::where('payment_status', 'paid')->sum('total_price');

        return view('admin.dashboard', compact(
            'total_ps',
            'today_booking',
            'income'
        ));
    }
}