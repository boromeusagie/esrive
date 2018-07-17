<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'email', 'phone', 'rsvp', 'comment', 'qrcode',
  ];

  public function wedding() {
    return $this->belongsTo('App\Wedding');
  }
}
