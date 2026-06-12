@extends('layouts.admin')

@section('admin-content')

<h1>Admin Dashboard 🎮</h1>

<hr>

<div style="
    display:flex;
    gap:20px;
    margin-top:30px;
    flex-wrap:wrap;
">

    <div style="
        background:#1e293b;
        color:white;
        padding:20px;
        border-radius:10px;
        width:220px;
    ">

        <h3>Total Booking</h3>

        <h1>
            {{ $totalBooking }}
        </h1>

    </div>

    <div style="
        background:#0f766e;
        color:white;
        padding:20px;
        border-radius:10px;
        width:220px;
    ">

        <h3>Total User</h3>

        <h1>
            {{ $totalUser }}
        </h1>

    </div>

    <div style="
        background:#7c3aed;
        color:white;
        padding:20px;
        border-radius:10px;
        width:220px;
    ">

        <h3>Total PlayStation</h3>

        <h1>
            {{ $totalPs }}
        </h1>

    </div>

    <div style="
        background:#dc2626;
        color:white;
        padding:20px;
        border-radius:10px;
        width:220px;
    ">

        <h3>Total Pendapatan</h3>

        <h1>

            Rp
            {{ number_format($totalPendapatan,0,',','.') }}

        </h1>

    </div>

</div>

@endsection