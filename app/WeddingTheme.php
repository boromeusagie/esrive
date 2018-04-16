<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeddingTheme extends Model
{
    public function wedding() {
      return $this->hasMany('App\Wedding');
    }
}
