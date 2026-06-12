@extends('layouts.admin')

@section('admin-content')
<h3>Dashboard</h3>

<p>Total PS: {{ $total_ps ?? 0 }}</p>
<p>Booking hari ini: {{ $today_booking ?? 0 }}</p>
<p>Pendapatan: Rp {{ $income ?? 0 }}</p>
@endsection