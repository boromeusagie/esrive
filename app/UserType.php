<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    /**
     * Relationship with User
     */
     public function user()
     {
       return $this->hasMany('App\User', 'foreign_key');
     }
}
