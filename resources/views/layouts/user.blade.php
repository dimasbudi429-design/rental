@extends('layouts.app')

@section('content')
<h2>USER PANEL</h2>

<a href="/user/dashboard">Dashboard</a>
<a href="/user/booking">Booking</a>
<a href="/user/history">Riwayat</a>

<hr>

@yield('user-content')
@endsection