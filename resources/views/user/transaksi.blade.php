@extends('layouts.user')

@section('page_title', 'Order Detail')

@section('style')
  <style>
    body {
      margin: 0;
      padding: 0;
    }
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        background-color: #ffffff;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 12px;
        line-height: 10px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
        position: relative;
        overflow: hidden;
    }

    .invoice-box .box-red {
      background-color: #E53935;
      color: #ffffff;
      width: 500px;
      height: auto;
      padding: 30px;
      text-align: center;
      position: absolute;
      top: 50px;
      right: -150px;
      transform: rotate(45deg);
    }

    .invoice-box .box-red span {
      font-size: 30px;
      font-weight: 700;
    }

    .invoice-box .box-red-dark {
      background-color: #A50101;
      color: #ffffff;
      width: 500px;
      height: auto;
      padding: 30px;
      text-align: center;
      position: absolute;
      top: 50px;
      right: -150px;
      transform: rotate(45deg);
    }

    .invoice-box .box-red-dark span {
      font-size: 30px;
      font-weight: 700;
    }

    .invoice-box .box-orange {
      background-color: #EF6C00;
      color: #ffffff;
      width: 500px;
      height: auto;
      padding: 30px;
      text-align: center;
      position: absolute;
      top: 50px;
      right: -150px;
      transform: rotate(45deg);
    }

    .invoice-box .box-orange span {
      font-size: 30px;
      font-weight: 700;
    }

    .invoice-box .box-green {
      background-color: #2E7D32;
      color: #ffffff;
      width: 500px;
      height: auto;
      padding: 30px;
      text-align: center;
      position: absolute;
      top: 40px;
      right: -150px;
      transform: rotate(45deg);
    }

    .invoice-box .box-green span {
      font-size: 30px;
      font-weight: 700;
    }

    .invoice-box img {
      margin-bottom: 20px;
      padding: 20px 0;
    }

    .invoice-box .order_id {
      /* line-height: 5px; */
    }

    .invoice-box table {
        margin-top: 30px;
        width: 100%;
        text-align: left;
        border: 1px solid #CECECE;
    }

    .invoice-box table th {
      background: #CECECE;
      padding: 20px;
    }

    .invoice-box table th.product {
      width: 70%;
    }

    .invoice-box table th.price {
      width: 30%;
    }

    .invoice-box table td {
      padding: 20px;
      border-right: 1px solid #CECECE;
    }

    .invoice-box table td.total {
      border-top: 2px solid #CECECE;
    }

  </style>
@endsection

@section('content')

<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<a href="{{ route('user.daftartransaksi') }}" class="btn btn-info m-b-20">< Kembali ke Daftar Transaksi</a>
<div class="invoice-box">
  <div class="print-invoice">
    <a href="{{ url('storage/user/' . $user->username . '/' . 'file/' . $order->order_id . '.pdf') }}" target="_blank" class="btn btn-sm btn-primary">
      <i class="mdi mdi-printer"></i><span> Print & Download Invoice</span>
    </a>
  </div>
  @if ($order->status == 1)
    <div class="box-red">
      <span>UNPAID</span>
    </div>
  @elseif ($order->status == 201)
    <div class="box-orange">
      <span>ON PROCESS</span>
    </div>
  @elseif ($order->status == 200)
    <div class="box-green">
      <span>PAID</span>
    </div>
  @elseif ($order->status == 202)
    <div class="box-red-dark">
      <span>CANCELED</span>
    </div>
  @endif
    <img src="https://scontent-sit4-1.xx.fbcdn.net/v/t1.0-9/38168664_2198126537088484_6826512206713061376_n.png?_nc_cat=0&oh=0634c83e162c1a61c386348664033cff&oe=5BD1FB94" style="width:100%; max-width:200px;">

    <div class="order_id">
      <h4>Order ID: {{ $order->order_id }}</h4>
      <p>Tanggal: {{ date('F j, Y', strtotime($order->created_at)) }}</p>
      <p>Nama: {{ $order->name }}</p>
      <p>No. HP: {{ $order->phone }}</p>
      <p>Email: {{ $user->email }}</p>
    </div>

    @if ($order->status == 201)
      <div class="check-payment">
        <a href="{{ route('notif.payment') }}" class="btn btn-sm btn-primary">
          <i class="mdi mdi-information-outline"></i><span> Cek Status Pembayaran</span>
        </a>
      </div>
    @endif

    <table cellspacing="0">
      <col width="500">
      <col width="300">
      <tr>
        <th class="product">Product</th>
        <th class="price">Price</th>
      </tr>
      <tr>
        <td>Paket {{ $order->product }}</td>
        <td>Rp {{ number_format($order->price, 0, ",", ".") }}</td>
      </tr>
      @if ($order->discount != null)
        <tr>
          <td>Discount</td>
          <td>{{ $order->discount }}%</td>
        </tr>
      @endif
      <tr>
        <td class="total"><strong>TOTAL</strong></td>
        <td class="total"><strong>Rp {{ number_format($order->gross_amount, 0, ",", ".") }}</strong></td>
      </tr>
    </table>
    <form id="payment-form" method="post" action="{{ route('snap.finish') }}">
      @csrf
      <input type="hidden" name="result_type" id="result-type" value="">
      <input type="hidden" name="result_data" id="result-data" value="">
    </form>
    @if ($order->status == 1)
      <div class="row justify-content-end m-t-20">
        <div class="col-4">
          <button id="pay-button" class="btn btn-success">Lanjut ke Pembayaran >></button>
        </div>
      </div>
    @endif
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->

@endsection

@section('scripts')
<script type="text/javascript">

  $('#pay-button').click(function (event) {
    event.preventDefault();
    $(this).attr("disabled", "disabled");

    $.ajax({

      url: '/snaptoken',
      cache: false,

      success: function(data) {
        //location = data;

        console.log('token = '+data);

        var resultType = document.getElementById('result-type');
        var resultData = document.getElementById('result-data');

        function changeResult(type,data){
          $("#result-type").val(type);
          $("#result-data").val(JSON.stringify(data));
          //resultType.innerHTML = type;
          //resultData.innerHTML = JSON.stringify(data);
        }

        snap.pay(data, {

          onSuccess: function(result){
            changeResult('success', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();
          },
          onPending: function(result){
            changeResult('pending', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          },
          onError: function(result){
            changeResult('error', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          }
        });
      }
    });
  });

</script>
@endsection
