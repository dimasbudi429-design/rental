@extends('layouts.admin')

@section('admin-content')

<h3>Booking</h3>

<table border="1" cellpadding="10">

<tr>

    <th>User</th>

    <th>PS</th>

    <th>Status</th>

    <th>Aksi</th>

</tr>

@foreach($bookings as $b)

<tr>

    <td>
        {{ $b->user->name }}
    </td>

    <td>
        {{ $b->playstation->name }}
    </td>

    <td>
        {{ $b->status }}
    </td>

    <td>

        <form
            action="/admin/bookings/{{ $b->id }}"
            method="POST"
        >

            @csrf

            @method('DELETE')

            <button
                type="submit"
                onclick="return confirm('Hapus booking ini?')"
                style="
                    background:red;
                    color:white;
                    border:none;
                    padding:6px 10px;
                    cursor:pointer;
                "
            >
                Hapus
            </button>

        </form>

    </td>

</tr>

@endforeach

</table>

@endsection