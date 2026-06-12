@extends('layouts.admin')

@section('admin-content')
<h3>Tambah PS</h3>

<form method="POST" action="/admin/playstations">
@csrf

<input type="text" name="name" placeholder="Nama PS"><br><br>

<select name="type">
    <option>PS4</option>
    <option>PS5</option>
</select><br><br>

<input type="number" name="price_per_hour" placeholder="Harga"><br><br>

<button type="submit">Simpan</button>

</form>
@endsection