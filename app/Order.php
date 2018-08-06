<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
  use Notifiable;

  public function user() {
    return $this->belongsTo('App\User');
  }

  public function payment() {
    return $this->hasOne('App\Payment');
  }

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'user_id', 'order_id', 'name', 'phone', 'email', 'product', 'price', 'promo_code', 'gross_amount', 'order_ip'
  ];
}
