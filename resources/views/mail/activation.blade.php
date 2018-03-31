<h2>Welcome {{ $name }}</h2>
<p>Terima kasih anda sudah mendaftar di Esrive Invitation</p>
<p>Silakan klik untuk aktivasi akun anda:</p>

<a href="{{ url('user/activation', $link) }}">Aktivasi Kode</a>
