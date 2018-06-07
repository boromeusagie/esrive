<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Wedding;
use Theme;
use App\User;
use App\WeddingTheme;
use Illuminate\Notifications\Notifiable;

class InvitationController extends Controller
{
  use Notifiable;

  public function index($url)
  {

    $wedding_url = Wedding::where('wedding_url', '=', $url)->first();
    $user = User::find($wedding_url->user_id)->first();

    $layout = array(
      'wedding' => $wedding_url,
      'user' => $user
    );


    $theme = Theme::uses(WeddingTheme::find($wedding_url->wedding_theme)->name);
    $hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
    $bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");


    $view = array(
      'user' => $user,
      'wedding' => $wedding_url,
      'hari' => $hari,
      'bulan' => $bulan
    );

    return $theme->scope('index', $view)->render();
  }
}
