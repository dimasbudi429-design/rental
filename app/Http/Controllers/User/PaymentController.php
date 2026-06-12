<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Transaction;

class PaymentController extends Controller
{
    public function uploadForm($id)
    {
        $transaction = Transaction::findOrFail($id);

        return view('user.payment', compact('transaction'));
    }

    public function upload(Request $request, $id)
    {
        $request->validate([
            'proof' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $transaction = Transaction::findOrFail($id);

        $file = $request->file('proof');

        $path = $file->store('payments', 'public');

        $transaction->update([
            'proof_of_payment' => $path,
            'payment_status' => 'waiting'
        ]);

        return redirect('/user/history')
            ->with('success', 'Bukti pembayaran berhasil diupload');
    }
}