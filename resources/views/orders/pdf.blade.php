@extends('orders.layout')

@section('stylepdf')
  <style>
    body {
      margin: 0;
      padding: 0;
    }
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
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
      right: -200px;
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
      top: 80px;
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
      right: -200px;
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
      top: 50px;
      right: -200px;
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
      line-height: 5px;
    }

    .invoice-box .info {
      margin: 50px 0;
      line-height: 5px;
    }

    .invoice-box table {
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


@section('pdf')
  <div class="invoice-box">
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
      <img src="https://scontent-sit4-1.xx.fbcdn.net/v/t1.0-9/38168664_2198126537088484_6826512206713061376_n.png?_nc_cat=0&oh=0634c83e162c1a61c386348664033cff&oe=5BD1FB94" style="width:100%; max-width:300px;">

      <div class="order_id">
        <h2>INVOICE</h2>
        <strong>Order ID: {{ $order->order_id }}</strong>
        <p>Created: {{ date('F j, Y') }}</p>
      </div>

      <div class="info">
        <strong>To:</strong>
        <p>{{ $order->name }}</p>
        <p>{{ $order->phone }}</p>
        <p>{{ $user->email }}</p>
      </div>

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
        <tr>
          <td class="total"><strong>TOTAL</strong></td>
          <td class="total"><strong>Rp {{ number_format($order->gross_amount, 0, ",", ".") }}</strong></td>
        </tr>
      </table>
  </div>
@endsection
