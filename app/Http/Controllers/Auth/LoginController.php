<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Alert;
use Toastr;
use Carbon\Carbon;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/user/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'userLogout']);
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function userLogout(Request $request)
    {
        $this->guard()->logout();

        //        $request->session()->invalidate();

        return redirect('/');
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->activated == false)
        {
          auth()->logout($user);
          Alert::warning("Akun anda belum terverifikasi. Silakan cek email anda.")->persistent("Close");
          return redirect()->back();
        }
        $user->last_login = Carbon::now();
        $user->user_ip = $request->getClientIp();
        $user->save();

        Toastr::success($message = "Anda berhasil login!", $title = "Selamat datang, " . $user->name, $options = ["closeButton" => true]);
        return redirect()->route('user.dashboard');
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
      return redirect()->back()
          ->with('error', "Email dan password tidak sesuai atau belum terdaftar.")
          ->withInput($request->only($this->username(), 'remember'));
    }
}
