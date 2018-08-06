<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
// use Auth;
// use Illuminate\Support\Facades\DB;
// use App\Order;

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $order)
    {
        $this->user = $user;
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      // $user = Auth::user();
      // $order = DB::table('orders')->where('user_id', $user->id)->first();
      // $path_pdf = '/public/storage/user/' . $user->username . '/file';
      // $name_pdf = $order->order_id . '.pdf';
      return $this->subject('Esrive Invitation - Invoice Order')
                  ->markdown('emails.user.orderconfirmation');
                  // ->attach($path_pdf, [
                  //   'as' => $name_pdf,
                  //   'mime' => 'application/pdf'
                  // ]);
    }
}
