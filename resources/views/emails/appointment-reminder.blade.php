<h2>Reminder Appointment Besok</h2>
<p>Halo {{ $appointment->patient->user->name }},</p>
<p>Ini pengingat bahwa kamu punya appointment <strong>besok</strong>.</p>
<ul>
    <li>Dokter: {{ $appointment->doctor->user->name }}</li>
    <li>Tanggal: {{ $appointment->appointment_date->format('d M Y') }}</li>
    <li>Jam: {{ $appointment->schedule->start_time }} – {{ $appointment->schedule->end_time }}</li>
</ul>
<p>Harap datang tepat waktu. Terima kasih!</p>
