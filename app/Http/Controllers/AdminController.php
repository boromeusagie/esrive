<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\AdminType;
use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Auth::user();
        return view('admin.dashboard', [
          'admin' => $admin
        ]);
    }

    public function daftarAdmin()
    {
      $admin = Auth::user();
      $daftaradmins = Admin::all();

      return view('admin.daftaradmin', [
        'admin' => $admin,
        'daftaradmins' => $daftaradmins
      ]);
    }
}
