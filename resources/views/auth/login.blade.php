<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Rental PS</title>

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

    <h1>LOGIN RENTAL PS</h1>

    @if(session('status'))
        <div style="
            background:green;
            padding:10px;
            margin-bottom:20px;
            border-radius:6px;
        ">
            {{ session('status') }}
        </div>
    @endif

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

    <form method="POST" action="/login">
        @csrf

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">
            LOGIN
        </button>
    </form>

    <div class="bottom">
        <a href="/register">
            Belum punya akun? Register
        </a>
    </div>

</div>

</body>
</html>