<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;

class ReportController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('payment_status', 'paid')
            ->latest()
            ->get();

        $total = $transactions->sum('total_price');

        return view('admin.reports.index', compact(
            'transactions',
            'total'
        ));
    }
}