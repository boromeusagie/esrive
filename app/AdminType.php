<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminType extends Model
{
    public function admins() {
      return $this->hasMany('App\Admin');
    }
}
