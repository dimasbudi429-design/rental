<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Playstation;
use App\Models\Booking;
use App\Services\BookingService;

class BookingController extends Controller
{
    protected $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    public function create()
    {
        $ps = Playstation::where('status', 'tersedia')->get();

        return view('user.booking.create', compact('ps'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'playstation_id' => 'required',
            'start_time' => 'required',
            'duration' => 'required|numeric|min:1'
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->id();

        $result = $this->bookingService->createBooking($data);

        if (isset($result['error'])) {
            return back()->with('error', $result['error']);
        }

        return redirect('/user/history')
            ->with('success', 'Booking berhasil');
    }

    public function show($id)
    {
        $booking = Booking::with('playstation')
            ->findOrFail($id);

        return view('user.booking.detail', compact('booking'));
    }
}