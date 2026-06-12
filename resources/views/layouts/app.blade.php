<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental PS</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            background:#0f172a;
            color:white;
        }

        nav{
            background:#1e293b;
            padding:20px;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        nav .left a,
        nav .right a{
            color:white;
            text-decoration:none;
            margin-right:20px;
            font-weight:bold;
        }

        nav button{
            padding:8px 16px;
            border:none;
            border-radius:6px;
            background:#ef4444;
            color:white;
            cursor:pointer;
        }

        .container{
            width:90%;
            margin:auto;
            padding:30px 0;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:20px;
            background:white;
            color:black;
        }

        table th,
        table td{
            padding:12px;
            border:1px solid #ddd;
        }

        input,
        select{
            width:100%;
            padding:10px;
            margin:10px 0;
            border-radius:6px;
            border:none;
        }

        .btn{
            background:#06b6d4;
            color:white;
            padding:10px 20px;
            border:none;
            border-radius:6px;
            cursor:pointer;
        }
    </style>
</head>
<body>

<nav>
    <div class="left">
        <a href="/">Rental PS</a>
    </div>

    <div class="right">
        @auth
            <span style="margin-right:20px;">
                Halo, {{ auth()->user()->name }}
            </span>

            <form method="POST" action="/logout" style="display:inline;">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @endauth
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

</body>
</html>