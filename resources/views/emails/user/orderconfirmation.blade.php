@component('mail::message', ['user' => $user, 'order' => $order])
# Hai {{ $user->name }},

Terima kasih sudah melakukan order Paket {{ $order->product }}. <br>
<br>
<br>
Berikut adalah detail order anda: <br>
<br>

@component('mail::table')
| Product               | Price         |
| ----------------------|:-------------:|
| Paket {{ $order->product }}             | Rp {{ $order->price }}      |
| Discount (PROMO CODE)           | {{ $order->discount != null ? $order->discount : "-" }}      |
| **TOTAL**            | **Rp {{ $order->gross_amount }}**      |
@endcomponent

Silakan lakukan pembayaran untuk mengaktifkan paket anda.

@component('mail::button', ['url' => 'http://localhost:1919/user/transaksi/'.$order->order_id, 'color' => 'green'])
Bayar Sekarang
@endcomponent

Terima kasih,<br>
{{ config('app.name') }}
@endcomponent
