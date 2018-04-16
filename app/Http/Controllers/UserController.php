<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\UserType;
use App\User;
use App\Wedding;
use Validator;
use Auth;
use Image;
use Alert;
use Input;
use Response;
use Hash;

class UserController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
      $user = Auth::user();
      $user_wedding = Wedding::find(['user_id' => $user->id])->first();

    	return view('user.dashboard', [
        'user' => Auth::user(),
        'user_wedding' => Wedding::find(['user_id' => $user->id])->first(),
        'userimg' => Storage::url('public/user/' . $user->username . '/' . 'img/' . $user->user_img)
      ]);
    }

    public function data()
    {
      $user = Auth::user();
      $user_wedding = Wedding::find(['user_id' => $user->id])->first();

    	return view('user.data', [
        'user' => Auth::user(),
        'user_wedding' => Wedding::find(['user_id' => $user->id])->first(),
        'userimg' => Storage::url('public/user/' . $user->username . '/' . 'img/' . $user->user_img),
        'groompic' => Storage::url('public/user/' . $user->username . '/' . 'img/' . $user_wedding->groom_pic),
        'bridepic' => Storage::url('public/user/' . $user->username . '/' . 'img/' . $user_wedding->bride_pic)
      ]);
    }

    public function pilihTema()
    {
      $user = Auth::user();
      $user_wedding = Wedding::find(['user_id' => $user->id])->first();

    	return view('user.pilihtema', [
        'user' => Auth::user(),
        'user_wedding' => Wedding::find(['user_id' => $user->id])->first(),
        'userimg' => Storage::url('public/user/' . $user->username . '/' . 'img/' . $user->user_img)
      ]);
    }

    public function editTema()
    {
      $user = Auth::user();
      $user_wedding = Wedding::find(['user_id' => $user->id])->first();

    	return view('user.edittema', [
        'user' => Auth::user(),
        'user_wedding' => Wedding::find(['user_id' => $user->id])->first(),
        'userimg' => Storage::url('public/user/' . $user->username . '/' . 'img/' . $user->user_img)
      ]);
    }

    public function daftarTamu()
    {
    	return view('user.pages.daftartamu');
    }

    public function ucapanSelamat()
    {
    	return view('user.pages.ucapanselamat');
    }

    public function galeriFoto()
    {
    	return view('user.pages.galerifoto');
    }

}
