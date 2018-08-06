@extends('layouts.user')

@section('page_title', 'Daftar Transaksi')

@section('content')

<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->

<div class="row">
  @if ($user->type != 3)
    <div class="col-md-8 col-12">
      @if ($user->orders == '[]')
        <p>Tidak ada Transaksi</p>
      @else
        <div class="row">
          @foreach ($orders as $order)
            <div class="col-md-6 col-12">
                <div class="card {{ $order->status == 1 ? 'card-outline-danger' : ($order->status == 200 ? 'card-outline-success' : ($order->status == 201 ? 'card-outline-warning' : 'card-outline-inverse'))}}">
                  <div class="card-header">
                    <h4 class="m-b-0 text-white">#ID: {{ $order->order_id }}</h4>
                  </div>
                  <div class="card-body">
                    <p>Product: Paket {{ $order->product }}</p>
                    <p>Status: {{ $order->status == 1 ? 'Belum Dibayar' : ($order->status == 200 ? 'Berhasil' : ($order->status == 201 ? 'Dalam Proses/Belum Dibayar' : 'Transaksi Dibatalkan'))}}</p>
                    <div class="row">
                      <div class="col-6">
                        <a href="{{ 'http://localhost:1919/user/transaksi/' . $order->order_id }}">Lihat Detail</a>
                      </div>
                      <div class="col-6">
                        @if ($order->status == 1)
                          <a href="{{ 'http://localhost:1919/user/transaksi/' . $order->order_id }}" class="btn btn-sm btn-success">Bayar Sekarang</a>
                        @endif
                      </div>
                    </div>
                    @if ($order->status ==201 )
                      <a href="{{ route('notif.payment') }}" class="btn btn-sm btn-primary m-t-10">
                        <i class="mdi mdi-information-outline"></i><span> Cek Status Pembayaran</span>
                      </a>
                    @endif
                  </div>
                </div>
            </div>
          @endforeach
        </div>
      @endif
    </div>
    <div class="col-md-4 col-12">
      <div class="card">
        <div class="card-body">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
      </div>
    </div>
  @else
    @foreach ($orders as $order)
      <div class="col-md-6  col-sm-6 col-12">
          <div class="card {{ $order->status == 1 ? 'card-outline-danger' : ($order->status == 200 ? 'card-outline-success' : ($order->status == 201 ? 'card-outline-warning' : 'card-outline-inverse'))}}">
            <div class="card-header">
              <h4 class="m-b-0 text-white">#ID: {{ $order->order_id }}</h4>
            </div>
            <div class="card-body">
              <p>Product: Paket {{ $order->product }}</p>
              <p>Status: {{ $order->status == 1 ? 'Belum Dibayar' : ($order->status == 200 ? 'Sudah Dibayar' : ($order->status == 201 ? 'Dalam Proses' : 'Order Dibatalkan'))}}</p>
              <div class="row">
                <div class="col-6">
                  <a href="{{ 'http://localhost:1919/user/transaksi/' . $order->order_id }}">Lihat Detail</a>
                </div>
                <div class="col-6">
                  @if ($order->status == 1)
                    <a href="{{ 'http://localhost:1919/user/transaksi/' . $order->order_id }}" class="btn btn-sm btn-success">Bayar Sekarang</a>
                  @endif
                </div>
              </div>
            </div>
          </div>
      </div>
    @endforeach
  @endif


</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->

@endsection
