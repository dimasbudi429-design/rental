<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Rental PS</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            background:#0f172a;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
            color:white;
        }

        .box{
            width:400px;
            background:#1e293b;
            padding:40px;
            border-radius:12px;
        }

        h1{
            margin-bottom:30px;
            text-align:center;
        }

        input{
            width:100%;
            padding:12px;
            margin-top:10px;
            margin-bottom:20px;
            border:none;
            border-radius:6px;
        }

        button{
            width:100%;
            padding:12px;
            border:none;
            border-radius:6px;
            background:#06b6d4;
            color:white;
            font-size:16px;
            cursor:pointer;
        }

        a{
            color:cyan;
            text-decoration:none;
        }

        .bottom{
            margin-top:20px;
            text-align:center;
        }
    </style>
</head>
<body>

<div class="box">

    <h1>REGISTER RENTAL PS</h1>

    @if($errors->any())
        <div style="
            background:red;
            padding:10px;
            margin-bottom:20px;
            border-radius:6px;
        ">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="/register">
        @csrf

        <label>Nama</label>
        <input type="text" name="name" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <label>Konfirmasi Password</label>
        <input type="password" name="password_confirmation" required>

        <button type="submit">
            REGISTER
        </button>
    </form>

    <div class="bottom">
        <a href="/login">
            Sudah punya akun? Login
        </a>
    </div>

</div>

</body>
</html>