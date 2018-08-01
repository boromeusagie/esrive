<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeddingThemesSetting extends Model
{
    public function wedding()
    {
      return $this->hasMany('App\Wedding');
    }
}
