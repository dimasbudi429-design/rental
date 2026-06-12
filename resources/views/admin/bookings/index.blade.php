@extends('layouts.admin')

@section('admin-content')
<h3>Booking</h3>

<table border="1">
<tr>
    <th>User</th>
    <th>PS</th>
    <th>Status</th>
</tr>

@foreach($bookings as $b)
<tr>
    <td>{{ $b->user->name }}</td>
    <td>{{ $b->playstation->name }}</td>
    <td>{{ $b->status }}</td>
</tr>
@endforeach
</table>
@endsection