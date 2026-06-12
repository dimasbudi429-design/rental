@extends('layouts.admin')

@section('admin-content')

<h1>Tambah PlayStation</h1>

<form method="POST" action="/admin/playstations" style="
    margin-top:20px;
    background:#1e293b;
    padding:30px;
    border-radius:12px;
">
    @csrf

    <label>Nama PS</label>
    <input type="text" name="name" placeholder="Contoh: PS 1" required>

    <label>Tipe</label>
    <select name="type" required>
        <option value="">-- pilih --</option>
        <option value="PS4">PS4</option>
        <option value="PS5">PS5</option>
    </select>

    <label>Harga / Jam</label>
    <input type="number" name="price_per_hour" placeholder="10000" required>

    <button class="btn" type="submit">
        Simpan
    </button>
</form>

@endsection