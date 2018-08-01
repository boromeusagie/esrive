@component('mail::message', ['user' => $user])

# Hei {{ $user->name }},

Selamat, akun anda sudah aktif dan bisa digunakan. <br><br>
Silakan login untuk masuk ke akun anda dan mulai membuat undangan.
<br>
<br>
<br>
Terima kasih,<br>
{{ config('app.name') }}

@component('mail::promotion')
  {{-- # UPGRADE AKUN ANDA UNTUK MENDAPATKAN FITUR YANG LEBIH LENGKAP UNTUK UNDANGAN ANDA
  @component('mail::button', ['url' => ''])
    LIHAT PAKET
  @endcomponent --}}
  <img src="{!! asset('storage/default.jpg') !!}" width="100%" height="auto" alt="">
@endcomponent

@endcomponent
