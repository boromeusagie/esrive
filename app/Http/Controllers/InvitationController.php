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
      'user' => $wedding_url
    );


    $theme = Theme::uses(WeddingTheme::find($wedding_url->wedding_theme)->name);

    $view = array(
      'user' => $user,
      'wedding' => $wedding_url
    );

    return $theme->scope('index', $view)->render();
  }
}
