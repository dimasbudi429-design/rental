<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Booking</title>

    <style>

        body{
            background:#0f172a;
            color:white;
            font-family:Arial;
            padding:30px;
        }

        .box{
            background:#111827;
            padding:30px;
            border-radius:12px;
            max-width:600px;
        }

        h1{
            margin-bottom:20px;
        }

        #timer{
            font-size:40px;
            color:cyan;
            margin-top:20px;
            font-weight:bold;
        }

    </style>

</head>
<body>

<div class="box">

    <h1>Detail Booking</h1>

    <p>
        PS:
        {{ $booking->playstation->name }}
    </p>

    <p>
        Durasi:
        {{ $booking->duration }} Jam
    </p>

    <p>
        Status:
        {{ $booking->status }}
    </p>

    <div id="timer">
        Loading...
    </div>

</div>

<script>

let remaining = {{ $booking->timer->remaining_time ?? 0 }};

function updateTimer(){

    let hours = Math.floor(remaining / 3600);

    let minutes = Math.floor((remaining % 3600) / 60);

    let seconds = remaining % 60;

    document.getElementById("timer").innerHTML =
        hours + ":" +
        minutes + ":" +
        seconds;

    if(remaining > 0){

        remaining--;

    }

}

updateTimer();

setInterval(updateTimer,1000);

</script>

</body>
</html>