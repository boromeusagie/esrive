<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use App\UserType;
use App\Order;
use Alert;
use App\Mail\OrderConfirmation;
use App\Payment;
use Barryvdh\DomPDF\Facade as PDF;

class OrderController extends Controller
{
  /**
   * Get a validator for an incoming registration request.
   *
   * @param  array  $data
   * @return \Illuminate\Contracts\Validation\Validator
   */
  protected function validator(array $data)
  {
      return Validator::make($data, [
        'name' => 'required|max:255',
        'phone' => 'required|numeric|digits_between:9,13',
        'product' => 'required',
        'promo_code' => 'nullable|unique:orders,promo_code',
      ]);
  }

  /**
   * Create a new order instance after a valid registration.
   *
   * @param  array  $data
   * @return \App\Order
   */
  protected function create(array $data)
  {
    $user = Auth::user();
    $product = UserType::where(['name' => $data['product']])->first();

    return Order::create([
      'user_id' => $user->id,
      'order_id' => 'ESRIVE' . uniqid(),
      'name' => $data['name'],
      'phone' => $data['phone'],
      'product' => $data['product'],
      'price' => $user->type == 2 ? $product->price / 2 : $product->price,
      'promo_code' => $data['promo_code'],
      'gross_amount' => $user->type == 2 ? $product->price / 2 : $product->price,
      'order_ip' => \Request::ip()
    ]);
  }
    /**
     * Make Order Request
     * use Illuminate\Http\Request
     */

     public function orderPaket(Request $request)
     {
       $input = $request->all();
       $validator = $this->validator($input);

       if ($validator->passes()) {
          $order_input = $this->create($input)->toArray();
          $order_id = $order_input['order_id'];

          $payment = new Payment();
          $payment->order_id = $order_input['id'];
          $payment->save();

          $user = Auth::user();

          // File::put($file_html, view('orders.pdf')
          //               ->with(['user' => $user, 'order' => $order])
          //               ->render()
          // );

          // $order = Order::find(['order_id' => $order_id])->first();
          $order = DB::table('orders')->where('order_id', $order_id)->first();

          $html = view('orders.pdf')->with(['user' => $user, 'order' => $order])->render();
          $file_pdf = public_path('storage/user/' . $user->username . '/file' . '/' . $order->order_id . '.pdf');

          $pdf = PDF::loadHTML($html)->setPaper('a4', 'landscape')->save($file_pdf);

          // $path_pdf = public_path('storage/user/' . $user->username . '/file');
          // $name_pdf = $order->order_id . '.pdf';

          Mail::to($user->email)
                ->send(new OrderConfirmation($user, $order));

          Alert::success('Silakan melakukan pembayaran.', 'Order Berhasil')->persistent("Close");

          return redirect()->route('user.daftartransaksi');
        } else {
          Alert::error('Silakan isi data anda.', 'Order Gagal')->persistent("Close");
          return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function sendpdf()
    {
      $user = Auth::user();
      $order = Order::find(['user_id' => $user->id])->first();
      $file_html = public_path('storage/user/' . $user->username . '/file' . '/' . $order->order_id . '.html');
      $file_pdf = public_path('storage/user/' . $user->username . '/file' . '/' . $order->order_id . '.pdf');

      // File::put($file_html, view('orders.pdf')
      //               ->with(['user' => $user, 'order' => $order])
      //               ->render()
      // );
      $html = view('orders.pdf')->with(['user' => $user, 'order' => $order])->render();
      $pdf = PDF::loadHTML($html)->setPaper('a4', 'landscape')->save($file_pdf);

      return $pdf->stream($file_pdf);

    }
}
