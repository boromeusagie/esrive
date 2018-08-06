<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Veritrans\Midtrans;
use App\Veritrans\Veritrans;
use Auth;
use App\Payment;
use App\Order;
use Alert;
use Barryvdh\DomPDF\Facade as PDF;

class SnapController extends Controller
{
    public function __construct()
    {
        Midtrans::$serverKey = 'SB-Mid-server-g139uD_Db1joG_hzRFJpATMI';
        //set is production to true for production mode
        Midtrans::$isProduction = false;

        Veritrans::$serverKey = 'SB-Mid-server-g139uD_Db1joG_hzRFJpATMI';
        //set is production to true for production mode
        Veritrans::$isProduction = false;
    }

    public function snap()
    {
        return view('snap_checkout');
    }

    public function token()
    {
        $user = Auth::user();
        $order = Order::where('user_id', '=', $user->id)->orderBy('created_at', 'desc')->first();

        // error_log('masuk ke snap token dri ajax');
        $midtrans = new Midtrans;

        $transaction_details = array(
            'order_id'      => $order->order_id,
            'gross_amount'  => $order->gross_amount
        );

        // Populate items
        $items = [
            array(
                'id'        => '1',
                'price'     => $order->price,
                'quantity'  => 1,
                'name'      => 'Paket ' . $order->product
            )
        ];

        // Populate customer's billing address
        // $billing_address = array(
        //     'first_name'    => "Boromeus",
        //     // 'last_name'     => "Agie",
        //     'address'       => "Karet Belakang 15A, Setiabudi.",
        //     'city'          => "Jakarta",
        //     'postal_code'   => "51161",
        //     'phone'         => "081322311801",
        //     'country_code'  => 'IDN'
        //     );

        // Populate customer's shipping address
        // $shipping_address = array(
        //     'first_name'    => "John",
        //     'last_name'     => "Watson",
        //     'address'       => "Bakerstreet 221B.",
        //     'city'          => "Jakarta",
        //     'postal_code'   => "51162",
        //     'phone'         => "081322311801",
        //     'country_code'  => 'IDN'
        //     );

        // Populate customer's Info
        $customer_details = array(
            'first_name'      => $order->name,
            // 'last_name'       => "Agie",
            'email'           => $user->email,
            'phone'           => $order->phone
            // 'billing_address' => $billing_address
            // 'shipping_address'=> $shipping_address
            );

        // Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit'       => 'hour',
            'duration'   => 24
        );

        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $items,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

        try
        {
            $snap_token = $midtrans->getSnapToken($transaction_data);
            //return redirect($vtweb_url);
            echo $snap_token;
        }
        catch (Exception $e)
        {
            return $e->getMessage;
        }
    }

    public function finish(Request $request)
    {
        $result = $request->input('result_data');
        $result = json_decode($result);
        // echo $result->status_message . '<br>';
        // echo 'RESULT <br><pre>';
        // var_dump($result);
        // echo '</pre>' ;

        $user = Auth::user();
        $order = Order::where('user_id', '=', $user->id)->orderBy('created_at', 'desc')->first();
        $payment = Payment::where('order_id', '=', $order->id)->first();

        $order->status = $result->status_code;
        $order->save();
        $payment->payment_type = $result->payment_type;
        $payment->payment_time = $result->transaction_time;
        $payment->save();
        if ($result->status_code == 200) {
          if ($order->product == 'Premium') {
            $user->type = 2;
            $user->save();
          } else {
            $user->type = 3;
            $user->save();
          }

          $html = view('orders.pdf')->with(['user' => $user, 'order' => $order])->render();

          $file_pdf = public_path('storage/user/' . $user->username . '/file' . '/' . $order->order_id . '.pdf');

          PDF::loadHTML($html)->setPaper('a4', 'landscape')->save($file_pdf);

          Alert::success('Akun ' . $order->product . ' sudah aktif.', 'Pembayaran Berhasil')->persistent("Close");
        } elseif ($result->status_code == 201) {

          $html = view('orders.pdf')->with(['user' => $user, 'order' => $order])->render();

          $file_pdf = public_path('storage/user/' . $user->username . '/file' . '/' . $order->order_id . '.pdf');

          PDF::loadHTML($html)->setPaper('a4', 'landscape')->save($file_pdf);

          Alert::warning('Silakan lakukan pembayaran sesuai petunjuk.', 'Transaksi Belum Dibayar')->persistent("Close");
        } else {
          Alert::error('Terjadi kesalahan pada pembayaran anda.', 'Transaksi Dibatalkan')->persistent("Close");
        }


        return redirect()->back();
    }

    public function notification()
    {
        $user = Auth::user();
        $order = Order::where('user_id', '=', $user->id)->orderBy('created_at', 'desc')->first();
        $payment = Payment::where('order_id', '=', $order->id)->first();
        // $url = 'https://api.sandbox.midtrans.com/v2/' . $order->order_id . '/status';
        // $server_key = 'SB-Mid-server-g139uD_Db1joG_hzRFJpATMI';
        // Veritrans::$isProduction = false;
        // Veritrans::$serverKey = 'SB-Mid-server-g139uD_Db1joG_hzRFJpATMI';
        // $notif = new Veritrans_Notification();


        $notif = Veritrans::status($order->order_id);
        // $result = json_decode($result);
        // echo $notif->status_message . '<br>';
        // echo 'RESULT <br><pre>';
        // var_dump($notif);
        // echo '</pre>' ;
        //
        // $json_result = file_get_contents('php://input');
        // $result = json_decode($json_result);
        // //
        // // echo $result;
        //
        // // $midtrans->post($url, $server_key, $result);
        //
        // // if($result){
        // //   $notif = $midtrans->status($result->order_id);
        // // }
        // //
        // // error_log(print_r($result,TRUE));
        //
        // $notif = $midtrans->status($result->order_id);
        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        $fraud = $notif->fraud_status;

        if ($transaction == 'capture') {
          // For credit card transaction, we need to check whether transaction is challenge by FDS or not
          if ($type == 'credit_card'){
            if($fraud == 'challenge'){
              // TODO set payment status in merchant's database to 'Challenge by FDS'
              // TODO merchant should decide whether this transaction is authorized or not in MAP
              Alert::warning('Kartu Kredit anda tidak valid atau bermasalah', 'Pembayaran Gagal')->persistent("Close");
              // echo "Transaction order_id: " . $order_id ." is challenged by FDS";
            }
            else {
              $order->status = $notif->status_code;
              $order->save();
              $payment->payment_type = $notif->payment_type;
              $payment->payment_time = $notif->transaction_time;
              $payment->save();

              if ($order->product == 'Premium') {
                $user->type = 2;
                $user->save();
              } else {
                $user->type = 3;
                $user->save();
              }

              $html = view('orders.pdf')->with(['user' => $user, 'order' => $order])->render();

              $file_pdf = public_path('storage/user/' . $user->username . '/file' . '/' . $order->order_id . '.pdf');

              PDF::loadHTML($html)->setPaper('a4', 'landscape')->save($file_pdf);
              // TODO set payment status in merchant's database to 'Success'
              Alert::success('Akun ' . $order->product . ' sudah aktif.', 'Pembayaran Berhasil')->persistent("Close");
              // echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
              }
            }
          }
        else if ($transaction == 'settlement'){
          $order->status = $notif->status_code;
          $order->save();
          $payment->payment_type = $notif->payment_type;
          $payment->payment_time = $notif->transaction_time;
          $payment->save();

          if ($order->product == 'Premium') {
            $user->type = 2;
            $user->save();
          } else {
            $user->type = 3;
            $user->save();
          }

          $html = view('orders.pdf')->with(['user' => $user, 'order' => $order])->render();

          $file_pdf = public_path('storage/user/' . $user->username . '/file' . '/' . $order->order_id . '.pdf');

          PDF::loadHTML($html)->setPaper('a4', 'landscape')->save($file_pdf);
          // TODO set payment status in merchant's database to 'Settlement'
          Alert::success('Akun ' . $order->product . ' sudah aktif.', 'Pembayaran Berhasil')->persistent("Close");
          // echo "Transaction order_id: " . $order_id ." successfully transfered using " . $type;
          }
          else if($transaction == 'pending'){
          // TODO set payment status in merchant's database to 'Pending'
          Alert::warning('Silakan lakukan pembayaran sesuai petunjuk.', 'Transaksi Belum Dibayar')->persistent("Close");
          // echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
          }
          else if ($transaction == 'deny') {
            $order->status = $notif->status_code;
            $order->save();
            $payment->payment_type = $notif->payment_type;
            $payment->payment_time = $notif->transaction_time;
            $payment->save();

            $html = view('orders.pdf')->with(['user' => $user, 'order' => $order])->render();

            $file_pdf = public_path('storage/user/' . $user->username . '/file' . '/' . $order->order_id . '.pdf');

            PDF::loadHTML($html)->setPaper('a4', 'landscape')->save($file_pdf);
            // TODO set payment status in merchant's database to 'Denied'
            Alert::error('Sudah melampaui batas waktu pembayaran.', 'Transaksi Dibatalkan')->persistent("Close");
            // echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
          }

      return redirect()->back();

    }
}
