<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Playstation;
use App\Models\Booking;
use App\Models\Transaction;

use App\Services\BookingService;

class BookingController extends Controller
{
    protected $bookingService;

    public function __construct(
        BookingService $bookingService
    )
    {
        $this->bookingService = $bookingService;
    }

    public function create()
    {
        $ps = Playstation::where(
            'status',
            'tersedia'
        )->get();

        return view(
            'user.booking.create',
            compact('ps')
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'playstation_id' => 'required',

            'start_time' => 'required',

            'duration' =>
                'required|numeric|min:1'

        ]);

        $data = $request->all();

        $data['user_id'] = auth()->id();

        $result = $this->bookingService
            ->createBooking($data);

        if (isset($result['error'])) {

            return back()->with(
                'error',
                $result['error']
            );

        }

        return redirect('/user/history')
            ->with(
                'success',
                'Booking berhasil'
            );
    }

    public function show($id)
    {
        $booking = Booking::with([

            'playstation',

            'transaction',

            'timer'

        ])->findOrFail($id);

        return view(
            'user.booking.detail',
            compact('booking')
        );
    }

    public function uploadPayment(
        Request $request,
        $id
    )
    {
        $request->validate([

            'payment_proof' =>
                'required|image'

        ]);

        $transaction = Transaction::findOrFail($id);

        $file = $request->file(
            'payment_proof'
        );

        $filename =
            time() . '.' .
            $file->getClientOriginalExtension();

        $file->move(
            public_path('payments'),
            $filename
        );

        $transaction->update([

            'payment_proof' => $filename

        ]);

        return back()->with(

            'success',

            'Bukti pembayaran berhasil upload'

        );
    }

    public function history()
    {
        $bookings = Booking::with([

            'playstation',

            'transaction',

            'timer'

        ])->where(

            'user_id',
            auth()->id()

        )->latest()->get();

        return view(
            'user.history',
            compact('bookings')
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