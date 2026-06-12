<form method="POST" action="/user/booking">
    @csrf

    <label>Pilih PS:</label>
    <select name="playstation_id">
        @foreach($ps as $p)
            <option value="{{ $p->id }}">
                {{ $p->name }} - Rp {{ $p->price_per_hour }}/jam
            </option>
        @endforeach
    </select>

    <label>Waktu Mulai:</label>
    <input type="datetime-local" name="start_time" required>

    <label>Durasi (jam):</label>
    <input type="number" name="duration" min="1" required>

    <button type="submit">Booking</button>
</form>