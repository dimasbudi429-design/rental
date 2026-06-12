@extends('layouts.admin')

@section('admin-content')

<h1 class="text-3xl font-bold mb-6">
    Laporan Rental PS
</h1>

<div class="bg-slate-800 rounded-xl p-6">

    <table class="w-full text-left">

        <thead>

            <tr class="border-b border-slate-600">

                <th class="p-3">No</th>
                <th class="p-3">User</th>
                <th class="p-3">PlayStation</th>
                <th class="p-3">Durasi</th>
                <th class="p-3">Total</th>
                <th class="p-3">Status</th>

            </tr>

        </thead>

        <tbody>

            @forelse($bookings as $booking)

            <tr class="border-b border-slate-700">

                <td class="p-3">
                    {{ $loop->iteration }}
                </td>

                <td class="p-3">
                    {{ $booking->user->name }}
                </td>

                <td class="p-3">
                    {{ $booking->playstation->name }}
                </td>

                <td class="p-3">
                    {{ $booking->duration }} Jam
                </td>

                <td class="p-3">
                    Rp {{ number_format($booking->transaction->total_price ?? 0,0,',','.') }}
                </td>

                <td class="p-3">
                    {{ $booking->status }}
                </td>

            </tr>

            @empty

            <tr>

                <td colspan="6" class="p-3">
                    Belum ada data laporan
                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection