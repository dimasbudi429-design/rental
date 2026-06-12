@extends('layouts.admin')

@section('admin-content')

<h1 style="margin-bottom:20px;">Data PlayStation</h1>

<a href="/admin/playstations/create" class="btn">
    + Tambah PlayStation
</a>

@if(session('success'))
    <div style="
        background:#16a34a;
        padding:15px;
        border-radius:8px;
        margin-top:20px;
        margin-bottom:20px;
    ">
        {{ session('success') }}
    </div>
@endif

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama PS</th>
            <th>Tipe</th>
            <th>Status</th>
            <th>Harga / Jam</th>
        </tr>
    </thead>
    <tbody>
        @forelse($ps as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->type }}</td>
                <td>{{ $item->status }}</td>
                <td>Rp {{ number_format($item->price_per_hour,0,',','.') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5" style="text-align:center;">
                    Belum ada data PlayStation
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection