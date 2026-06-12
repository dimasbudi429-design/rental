@extends('layouts.user')

@section('content')

<h1>Detail Booking</h1>

<hr>

<p>
    <b>PlayStation:</b>
    {{ $booking->playstation->name }}
</p>

<p>
    <b>Durasi:</b>
    {{ $booking->duration }} Jam
</p>

<p>
    <b>Status:</b>
    {{ $booking->status }}
</p>

<p>
    <b>Total:</b>

    Rp

    {{ number_format(
        $booking->transaction->total_price ?? 0,
        0,
        ',',
        '.'
    ) }}
</p>

<hr>

<h2>TIMER</h2>

@if($booking->timer)

<h1 id="timer">
    00:00:00
</h1>

<script>

let endTime =
{{ strtotime($booking->timer->end_time) }} * 1000;

function updateTimer()
{
    let now =
        new Date().getTime();

    let distance =
        Math.floor(
            (endTime - now) / 1000
        );

    if(distance < 0)
    {
        distance = 0;
    }

    let hours =
        Math.floor(distance / 3600);

    let minutes =
        Math.floor(
            (distance % 3600) / 60
        );

    let seconds =
        distance % 60;

    document
        .getElementById('timer')
        .innerHTML =

        String(hours).padStart(2,'0')
        + ':' +

        String(minutes).padStart(2,'0')
        + ':' +

        String(seconds).padStart(2,'0');

    if(distance <= 0)
    {
        clearInterval(timerInterval);
    }
}

const timerInterval =
    setInterval(updateTimer,1000);

updateTimer();

</script>

@else

<p>
    Timer belum aktif
</p>

@endif

<hr>

<h3>Upload Bukti Pembayaran</h3>

<form
    action="/user/payment/{{ $booking->transaction->id }}"
    method="POST"
    enctype="multipart/form-data"
>

    @csrf

    <input
        type="file"
        name="payment_proof"
        required
    >

    <br><br>

    <button type="submit">

        Upload Bukti

    </button>

</form>

@if(
    $booking->transaction &&
    $booking->transaction->payment_proof
)

<hr>

<h3>Bukti Pembayaran</h3>

<img
    src="/payments/{{ $booking->transaction->payment_proof }}"
    width="300"
    style="
        border-radius:10px;
        margin-top:10px;
    "
>

@endif

@endsection