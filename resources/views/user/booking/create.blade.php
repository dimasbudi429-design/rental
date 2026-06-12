@extends('layouts.user')

@section('user-content')
<h3>Booking</h3>

<form method="POST" action="/user/booking">
@csrf

<select name="playstation_id">
@foreach($ps as $p)
<option value="{{ $p->id }}">
{{ $p->name }} - {{ $p->price_per_hour }}
</option>
@endforeach
</select><br><br>

<input type="datetime-local" name="start_time"><br><br>
<input type="number" name="duration" placeholder="Durasi"><br><br>

<button type="submit">Booking</button>
</form>
@endsection