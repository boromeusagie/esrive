<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Response;

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
    	return view('user.dashboard');
    }

    public function data()
    {
    	return view('user.data');
    }

    public function pilihTema()
    {
      return view('user.pilihtema');
    }

    public function editTema()
    {
    	return view('user.edittema');
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
