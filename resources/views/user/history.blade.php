<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Booking</title>

    <style>

        body{
            background:#0f172a;
            color:white;
            font-family:Arial;
            padding:30px;
        }

        h1{
            margin-bottom:20px;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:20px;
        }

        th, td{
            border:1px solid #334155;
            padding:12px;
            text-align:left;
        }

        th{
            background:#1e293b;
        }

        tr{
            background:#111827;
        }

        a{
            background:cyan;
            color:black;
            padding:8px 12px;
            text-decoration:none;
            border-radius:5px;
            font-weight:bold;
        }

    </style>

</head>
<body>

<h1>USER HISTORY</h1>

<table>

    <tr>
        <th>No</th>
        <th>PlayStation</th>
        <th>Durasi</th>
        <th>Status</th>
        <th>Detail</th>
    </tr>

    @forelse($bookings as $booking)

    <tr>

        <td>
            {{ $loop->iteration }}
        </td>

        <td>
            {{ $booking->playstation->name }}
        </td>

        <td>
            {{ $booking->duration }} Jam
        </td>

        <td>
            {{ $booking->status }}
        </td>

        <td>

            <a href="/user/booking/{{ $booking->id }}">
                Lihat
            </a>

        </td>

    </tr>

    @empty

    <tr>

        <td colspan="5">
            Belum ada booking
        </td>

    </tr>

    @endforelse

</table>

</body>
</html>