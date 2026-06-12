@extends('layouts.admin')

@section('admin-content')
<h3>Data PS</h3>

<a href="/admin/playstations/create">Tambah PS</a>

<table border="1">
<tr>
    <th>Nama</th>
    <th>Tipe</th>
    <th>Status</th>
    <th>Harga</th>
</tr>

@foreach($ps as $p)
<tr>
    <td>{{ $p->name }}</td>
    <td>{{ $p->type }}</td>
    <td>{{ $p->status }}</td>
    <td>{{ $p->price_per_hour }}</td>
</tr>
@endforeach
</table>
@endsection