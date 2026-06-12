@extends('layouts.user')

@section('user-content')
<h3>Upload Pembayaran</h3>

<form method="POST" enctype="multipart/form-data">
@csrf

<input type="file" name="proof"><br><br>

<button type="submit">Upload</button>

</form>
@endsection