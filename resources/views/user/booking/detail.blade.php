@extends('layouts.user')

@section('user-content')
<h3>Detail Booking</h3>

<p>PS: {{ $booking->playstation->name }}</p>

<div id="timer">Loading...</div>

<script>
setInterval(() => {
fetch('/timer/{{ $booking->id }}/remaining')
.then(res => res.json())
.then(data => {
let m = Math.floor(data.remaining / 60);
let s = data.remaining % 60;
document.getElementById('timer').innerText = m + ":" + (s<10?'0':'') + s;
});
}, 1000);
</script>
@endsection