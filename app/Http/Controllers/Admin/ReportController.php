<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class ReportController extends Controller
{
    public function index()
    {
        $bookings = Booking::with([
            'user',
            'playstation',
            'transaction'
        ])->latest()->get();

        return view('admin.reports.index', compact('bookings'));
    }
}