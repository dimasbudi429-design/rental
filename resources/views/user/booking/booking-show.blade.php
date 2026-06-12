<hr>

<h3>Upload Bukti Pembayaran</h3>

<form
    action="/user/payment/{{ $booking->transaction->id }}"
    method="POST"
    enctype="multipart/form-data"
>

    @csrf

    <input
        type="file"
        name="payment_proof"
    >

    <br><br>

    <button type="submit">

        Upload

    </button>

</form>