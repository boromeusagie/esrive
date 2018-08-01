<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password', 'activated', 'user_img', 'qrcode',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Relationship to UserType
     */
     public function userType()
     {
       return $this->belongsTo('App\UserType');
     }

     /**
      * Relationship to Wedding
      */
      public function wedding()
      {
        return $this->hasOne('App\Wedding', 'user_id');
      }

      public function testimonial() {
        return $this->hasOne('App\Testimonial');
      }

      public function orders() {
        return $this->hasMany('App\Order');
      }

      // public function getCeremonyAttribute()
      // {
      //   return \Carbon\Carbon::parse($this->attributes['wedding_cer_date'])
      //     ->format('d, M Y');
      // }
      //
      // public function getReceptionAttribute()
      // {
      //   return \Carbon\Carbon::parse($this->attributes['wedding_rec_date'])
      //     ->format('d, M Y');
      // }
}
