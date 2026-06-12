@extends('layouts.app')

@section('content')

<h1 style="margin-bottom:20px;">
    Booking PlayStation
</h1>

@if(session('success'))
    <div style="
        background:green;
        padding:15px;
        border-radius:8px;
        margin-bottom:20px;
    ">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div style="
        background:red;
        padding:15px;
        border-radius:8px;
        margin-bottom:20px;
    ">
        {{ $errors->first() }}
    </div>
@endif

<form method="POST" action="/user/booking" style="
    background:#1e293b;
    padding:30px;
    border-radius:12px;
">

    @csrf

    <label>Pilih PlayStation</label>

    <select name="playstation_id" required>
        <option value="">-- pilih PS --</option>

        @foreach($playstations as $ps)

            <option value="{{ $ps->id }}">
                {{ $ps->name }}
                -
                {{ $ps->type }}
                -
                Rp {{ number_format($ps->price_per_hour,0,',','.') }}/jam
            </option>

        @endforeach
    </select>

    <br><br>

    <label>Durasi Main (Jam)</label>

    <input
        type="number"
        name="duration"
        min="1"
        required
        style="
            width:100%;
            padding:12px;
            border:none;
            border-radius:6px;
            margin-top:10px;
        "
    >

    <br><br>

    <button class="btn" type="submit">
        Booking Sekarang
    </button>

</form>

@endsection