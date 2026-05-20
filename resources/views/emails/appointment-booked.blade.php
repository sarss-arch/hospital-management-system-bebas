<h2>Booking Berhasil</h2>
<p>Halo {{ $appointment->patient->user->name }}, appointment kamu telah dibuat.</p>
<ul>
    <li>Dokter: {{ $appointment->doctor->user->name }}</li>
    <li>Tanggal: {{ $appointment->appointment_date->format('d M Y') }}</li>
    <li>Jam: {{ $appointment->schedule->start_time }} - {{ $appointment->schedule->end_time }}</li>
    <li>Keluhan: {{ $appointment->complaint }}</li>
</ul>
<p>Silakan datang tepat waktu. Terima kasih!</p>
