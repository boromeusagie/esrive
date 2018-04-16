<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wedding extends Model
{

  protected $table = 'weddings';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'wedding_url', 'groom_full', 'groom_nick', 'groom_profile', 'bride_full', 'bride_nick', 'bride_profile', 'wedding_cer', 'wedding_cer_date', 'wedding_cer_begin', 'wedding_cer_end', 'wedding_rec', 'wedding_rec_date', 'wedding_rec_begin', 'wedding_rec_end'
  ];

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function weddingTheme() {
    return $this->belongsTo('App\WeddingTheme');
  }
}
