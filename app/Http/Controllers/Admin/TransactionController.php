<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('booking')
            ->latest()
            ->get();

        return view('admin.transactions.index', compact('transactions'));
    }

    public function verify($id)
    {
        $transaction = Transaction::findOrFail($id);

        $transaction->update([
            'payment_status' => 'paid'
        ]);

        return back()->with('success', 'Pembayaran diverifikasi');
    }
}