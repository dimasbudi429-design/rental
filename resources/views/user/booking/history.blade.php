@extends('layouts.user')

@section('user-content')
<h3>Riwayat</h3>

@foreach($bookings as $b)
<p>
PS: {{ $b->playstation->name }} |
Status: {{ $b->status }} |
<a href="/user/booking/{{ $b->id }}">Detail</a>
</p>
@endforeach

@endsection