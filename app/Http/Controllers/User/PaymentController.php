<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;

class PaymentController extends Controller
{
    public function uploadForm($id)
    {
        $transaction = Transaction::where('booking_id', $id)->firstOrFail();

        return view('user.payment.upload', compact('transaction'));
    }

    public function upload(Request $request, $id)
    {
        $request->validate([
            'proof' => 'required|image'
        ]);

        $file = $request->file('proof');
        $name = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('uploads'), $name);

        $transaction = Transaction::where('booking_id', $id)->firstOrFail();

        $transaction->update([
            'proof_of_payment' => $name,
            'payment_status' => 'waiting_verification'
        ]);

        return redirect('/user/history')
            ->with('success', 'Bukti pembayaran berhasil diupload');
    }
}