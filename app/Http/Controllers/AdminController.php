<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Admin;
use App\AdminType;
use Auth;
use Illuminate\Support\Facades\Artisan;
use App\WeddingTheme;
use Toastr;

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
        'admins' => $admins
      ]);
    }

    public function daftarUser()
    {
      $users = User::all();

      return view('admin.daftaruser', [
        'users' => $users
      ]);
    }

    public function daftarTema()
    {
      $themes = WeddingTheme::all();

      return view('admin.daftartema', [
        'themes' => $themes
      ]);
    }

    public function adminType()
    {
      $types = AdminType::all();

      return view('admin.admintype', [
        'types' => $types
      ]);
    }

    public function addTheme(Request $request)
    {
      $theme = new WeddingTheme;

      $theme->name = $request->input('name');
      $theme->author = $request->input('author');

      Artisan::call('theme:create', ['name' => $request->input('name')]);

      $theme->save();

      Toastr::success($message = 'Berhasil disimpan!', $title = null, $options = ["closeButton" => true, "positionClass" => "toast-top-center"]);
      return redirect('es-admin/daftar-tema');
    }
}
