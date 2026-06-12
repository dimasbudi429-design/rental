<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Pembayaran</title>

    <style>

        body{
            background:#0f172a;
            color:white;
            font-family:Arial;
            padding:30px;
        }

        .box{
            background:#1e293b;
            padding:30px;
            border-radius:12px;
            max-width:500px;
        }

        input{
            margin-top:20px;
        }

        button{
            margin-top:20px;
            padding:12px 20px;
            background:cyan;
            border:none;
            border-radius:8px;
            cursor:pointer;
        }

    </style>

</head>
<body>

<div class="box">

    <h1>Upload Bukti Pembayaran</h1>

    <br>

    <p>
        Total Bayar:
        Rp {{ number_format($transaction->total_price,0,',','.') }}
    </p>

    <form
        action="/user/payment/{{ $transaction->id }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf

        <input type="file" name="proof" required>

        <br>

        <button type="submit">
            Upload Bukti
        </button>

    </form>

</div>

</body>
</html>