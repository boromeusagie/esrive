<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
    	return view('user.dashboard', ['user' => Auth::user()]);
    }

    public function data()
    {
      setlocale(LC_TIME, 'INDONESIA');

      $user = Auth::user();
    	return view('user.data', ['user' => Auth::user(), 'user_wedding' => Wedding::find(['user_id' => $user->id])->first(), 'date' => strftime( "%A, %d %B %Y %H:%M", time())]);
    }

    public function editData(Request $request)
    {
      $user = Auth::user();


    }

    public function pilihTema()
    {
    	return view('user.pilihtema', ['user' => Auth::user()]);
    }

    public function editTema()
    {
    	return view('user.edittema', ['user' => Auth::user()]);
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
