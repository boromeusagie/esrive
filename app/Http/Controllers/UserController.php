<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Response;
use Image;

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

    public function profile()
    {
      return view('user.profile');
    }

    public function upLoadProfile(Request $request)
    {
      $user = Auth::user();

      if($request->hasFile('image')) {
          $userimg = $request->file('image');
          $file_image = $user->username . '-profile-' . time() . '.' . $userimg->getClientOriginalExtension();
          $path = public_path('storage/user/'.$user->username.'/'.'img/' . $file_image);
          $image = Image::make($userimg);
          $image->save($path);

          $user->user_img = $file_image;
          $user->save();
        }

      return response(null, 202);
      // if($request->hasFile('image')) {
      //   $imagename = $request->image->getClientOriginalName();
      //   $request->image->storeAs('public/storage')
      // }
      // $request->user()->update(['user_img' => $request->image]);
      // $request->user()->user_img = $request->image;
      // $request->save();
      // return response(null, 201);
    }

    public function galeriFoto()
    {
    	return view('user.pages.galerifoto');
    }

}
