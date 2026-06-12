@extends('layouts.admin')

@section('admin-content')
<h3>Transaksi</h3>

<table border="1">
<tr>
    <th>Booking</th>
    <th>Total</th>
    <th>Status</th>
</tr>

@foreach($transactions as $t)
<tr>
    <td>{{ $t->booking_id }}</td>
    <td>{{ $t->total_price }}</td>
    <td>{{ $t->payment_status }}</td>
</tr>
@endforeach
</table>
@endsection