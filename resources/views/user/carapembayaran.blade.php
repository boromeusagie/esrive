@extends('layouts.user')

@section('page_title', 'Cara Pembayaran')

@section('content')

<div class="card">
    <div class="card-body">

      <ul class="nav nav-pills m-t-30 m-b-30 justify-content-center">
        <li class="nav-item">
          <a href="#creditCard" class="nav-link active show" data-toggle="tab" aria-expanded="false">Card Payment</a>
        </li>
        <li class="nav-item">
          <a href="#virtualAccount" class="nav-link" data-toggle="tab" aria-expanded="false">Virtual Account</a>
        </li>
        <li class="nav-item">
          <a href="#directDebit" class="nav-link" data-toggle="tab" aria-expanded="false">Direct Debit</a>
        </li>
        <li class="nav-item">
          <a href="#eWallet" class="nav-link" data-toggle="tab" aria-expanded="false">E-Wallet</a>
        </li>
        <li class="nav-item">
          <a href="#counterPayment" class="nav-link" data-toggle="tab" aria-expanded="false">Counter</a>
        </li>
      </ul>
      <div class="tab-content br-n pn">
        <div id="creditCard" class="tab-pane active show text-center">
          <ul class="logo-payment m-t-40">
            <li><img src="{{ asset('storage/img/payment/visa.png') }}" alt=""></li>
            <li><img src="{{ asset('storage/img/payment/mastercard.png') }}" alt=""></li>
            <li><img src="{{ asset('storage/img/payment/jcb.png') }}" alt=""></li>
            <li><img src="{{ asset('storage/img/payment/american-express.png') }}" alt=""></li>
          </ul>
        </div>
        <div id="virtualAccount" class="tab-pane text-center">
          <ul class="logo-payment m-t-40">
            <li><img src="{{ asset('storage/img/payment/atm-bersama.png') }}" alt=""></li>
            <li><img src="{{ asset('storage/img/payment/logo_prima_atm.png') }}" alt=""></li>
            <li><img src="{{ asset('storage/img/payment/alto.png') }}" alt=""></li>
            <li><img src="{{ asset('storage/img/payment/bni.png') }}" alt=""></li>
            <li><img src="{{ asset('storage/img/payment/mandiri.png') }}" alt=""></li>
            <li><img src="{{ asset('storage/img/payment/ATM_BCA.png') }}" alt=""></li>
          </ul>
        </div>
        <div id="directDebit" class="tab-pane text-center">
          <ul class="logo-payment m-t-40">
            <li><img src="{{ asset('storage/img/payment/mandiri-clickpay.png') }}" alt=""></li>
            <li><img src="{{ asset('storage/img/payment/cimb.png') }}" alt=""></li>
            <li><img src="{{ asset('storage/img/payment/bri-e-pay.jpg') }}" alt=""></li>
            <li><img src="{{ asset('storage/img/payment/danamon.jpg') }}" alt=""></li>
            <li><img src="{{ asset('storage/img/payment/BCA-Klikpay.png') }}" alt=""></li>
          </ul>
        </div>
        <div id="eWallet" class="tab-pane text-center">
          <ul class="logo-payment m-t-40">
            <li><img src="{{ asset('storage/img/payment/gopay.png') }}" alt=""></li>
            <li><img src="{{ asset('storage/img/payment/Logo_tcash.png') }}" alt=""></li>
            <li><img src="{{ asset('storage/img/payment/logo-dompetku-vector.png') }}" alt=""></li>
            <li><img src="{{ asset('storage/img/payment/Line_pay_logo.png') }}" alt=""></li>
            <li><img src="{{ asset('storage/img/payment/mandiri_ecash_logo.png') }}" alt=""></li>
          </ul>
        </div>
        <div id="counterPayment" class="tab-pane text-center">
          <ul class="logo-payment m-t-40">
            <li><img src="{{ asset('storage/img/payment/indomaret.png') }}" alt=""></li>
          </ul>
        </div>
      </div>

    </div>
</div>

@endsection
