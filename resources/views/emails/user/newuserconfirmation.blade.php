@component('mail::message', ['user' => $user, 'link' => $link])
# Hai {{ $user->name }},

Terima kasih sudah menggunakan layanan undangan online dari **Esrive Invitation**.

Silakan klik tombol di bawah ini untuk mengaktifkan akun anda.

@component('mail::button', ['url' => 'http://localhost:1919/user/activation/' . $link])
Aktivasi Akun
@endcomponent

Terima kasih,<br>
{{ config('app.name') }}
@endcomponent
