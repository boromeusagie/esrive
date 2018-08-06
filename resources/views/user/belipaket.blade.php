@extends('layouts.user')

@section('page_title', 'Beli Paket')

@section('content')

<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
  <div class="row">
    <div class="col-md-8 col-12">
      <form action="{{ route('user.orderpaket') }}" method="POST" class="form-material m-t-10" enctype="multipart/form-data">
        @csrf
        <div class="card card-outline-esrive">
          <div class="card-header">
            <h4 class="m-b-0 text-white">Order Paket</h4>
          </div>
          <div class="card-body">
            <h5 class="m-b-20">Silakan isi data di bawah ini:</h5>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} m-b 40">
              <label for="name">Nama Lengkap</label>
              <input type="text" class="form-control" id="name" name="name" required>
              @if ($errors->has('name'))
                  <span class="help-block text-danger">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} m-b 40">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="{{ isset($user->email) ? $user->email : "" }}" disabled>
            </div>
            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }} m-b 40">
              <label for="phone">No. Handphone</label>
              <input type="text" class="form-control" id="phone" name="phone" required>
              @if ($errors->has('phone'))
                  <span class="help-block text-danger">
                      <strong>{{ $errors->first('phone') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('product') ? ' has-error' : '' }} m-b 40">
              <label for="product">Pilih Paket</label>
              <div class="m-b-10">
                <label class="custom-control custom-radio">
                    <input id="premium" name="product" type="radio" class="custom-control-input" value="Premium" {{ $user->type == 2 || $user->type == 3 ? 'disabled' : '' }}>
                    <span class="custom-control-label">Premium {{ $user->type == 2 ? '' : '-- Rp 350.000' }}</span>
                </label>
                <label class="custom-control custom-radio">
                    <input id="ultimate" name="product" type="radio" class="custom-control-input" value="Ultimate" {{ $user->type == 3 ? 'disabled' : '' }}>
                    <span class="custom-control-label">Ultimate -- Rp {{ $user->type == 2 ? '350.000' : '700.000' }}</span>
                </label>
                @if ($errors->has('product'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('product') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <input id="checkbox" type="checkbox" class="filled-in chk-col-light-blue" name="remember" {{ old('remember') ? 'checked' : '' }}>
              <label for="checkbox"> Punya kode promo? </label>
            </div>
            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }} m-b 40 promo-code">
              <label for="promo_code">Masukkan kode promo anda</label>
              <input type="text" class="form-control" id="phone" name="promo_code">
              @if ($errors->has('promo_code'))
                  <span class="help-block text-danger">
                      <strong>{{ $errors->first('promo_code') }}</strong>
                  </span>
              @endif
            </div>

            <div class="text-center">
              <button class="btn btn-info" type="submit">ORDER</button>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-4 col-12">
      <div class="card m-t-10">
        <div class="card-body">
          <h4>Pilihan Cara Pembayaran</h4>
          <div class="m-t-20">
            <strong>Kartu Kredit</strong>
            <ul class="logo-payment m-t-5">
              <li><img src="{{ asset('storage/img/payment/visa.png') }}" alt="" width="40" height="auto"></li>
              <li><img src="{{ asset('storage/img/payment/mastercard.png') }}" alt="" width="40" height="auto"></li>
            </ul>
          </div>
          <div class="m-t-20">
            <strong>Transfer Bank</strong>
            <ul class="logo-payment m-t-5">
              <li><img src="{{ asset('storage/img/payment/atm-bersama.png') }}" alt="" width="40" height="auto"></li>
              <li><img src="{{ asset('storage/img/payment/logo_prima_atm.png') }}" alt="" width="40" height="auto"></li>
              <li><img src="{{ asset('storage/img/payment/alto.png') }}" alt="" width="40" height="auto"></li>
              <li><img src="{{ asset('storage/img/payment/bni.png') }}" alt="" width="40" height="auto"></li>
              <li><img src="{{ asset('storage/img/payment/mandiri.png') }}" alt="" width="40" height="auto"></li>
              <li><img src="{{ asset('storage/img/payment/ATM_BCA.png') }}" alt="" width="40" height="auto"></li>
            </ul>
          </div>
          <div class="m-t-20">
            <strong>Debit</strong>
            <ul class="logo-payment m-t-5">
              <li><img src="{{ asset('storage/img/payment/mandiri-clickpay.png') }}" alt="" width="45" height="auto"></li>
              <li><img src="{{ asset('storage/img/payment/cimb.png') }}" alt="" width="45" height="auto"></li>
              <li><img src="{{ asset('storage/img/payment/bri-e-pay.jpg') }}" alt="" width="45" height="auto"></li>
              <li><img src="{{ asset('storage/img/payment/danamon.jpg') }}" alt="" width="45" height="auto"></li>
              <li><img src="{{ asset('storage/img/payment/BCA-Klikpay.png') }}" alt="" width="45" height="auto"></li>
            </ul>
          </div>
          <div class="m-t-20">
            <strong>e-Payment</strong>
            <ul class="logo-payment m-t-5">
              <li><img src="{{ asset('storage/img/payment/gopay.png') }}" alt="" width="50" height="auto"></li>
              <li><img src="{{ asset('storage/img/payment/Logo_tcash.png') }}" alt="" width="50" height="auto"></li>
              <li><img src="{{ asset('storage/img/payment/logo-dompetku-vector.png') }}" alt="" width="50" height="auto"></li>
              <li><img src="{{ asset('storage/img/payment/Line_pay_logo.png') }}" alt="" width="50" height="auto"></li>
              <li><img src="{{ asset('storage/img/payment/mandiri_ecash_logo.png') }}" alt="" width="50" height="auto"></li>
            </ul>
          </div>
          <div class="m-t-20">
            <strong>Minimarket</strong>
            <ul class="logo-payment m-t-5">
              <li><img src="{{ asset('storage/img/payment/indomaret.png') }}" alt="" width="80" height="auto"></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->

@endsection

@section('scripts')
<script type="text/javascript">
  $(function() {
    $('#checkbox').change(function(){
        if(this.checked)
            $('.promo-code').fadeIn('slow');
        else
            $('.promo-code').fadeOut('slow');

    });
  });
</script>
@endsection
