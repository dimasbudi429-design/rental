@extends('layouts.user')

@section('user-content')
<h3>Dashboard User</h3>
<p>Selamat datang, {{ auth()->user()->name }}</p>
@endsection