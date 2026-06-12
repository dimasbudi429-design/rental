@extends('layouts.app')

@section('content')
<h2>ADMIN PANEL</h2>

<a href="/admin/dashboard">Dashboard</a>
<a href="/admin/playstations">PS</a>
<a href="/admin/bookings">Booking</a>
<a href="/admin/transactions">Transaksi</a>
<a href="/admin/reports">Laporan</a>

<hr>

@yield('admin-content')
@endsection