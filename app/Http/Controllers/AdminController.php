<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
        //$admin = Auth::user();
        return view('admin.dashboard');
    }

    public function daftarAdmin()
    {
      $admins = Admin::all();

      return view('admin.daftaradmin', [
        'admins' => $admins,
      ]);
    }

    public function daftarUser()
    {
      $users = User::all();

      return view('admin.daftaruser', [
        'users' => $users,
      ]);
    }
}
