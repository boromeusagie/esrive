<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\UserType;
use App\User;
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
    	return view('user.data', ['user' => Auth::user()]);
    }

    public function pilihTema()
    {
    	return view('user.pages.pilihtema');
    }

    public function editTampilan()
    {
    	return view('user.pages.edittampilan');
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
