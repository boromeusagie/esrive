<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Wedding;
use Mail;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Make unique Username
     */
     public function getUsername()
     {
       return str_random(8);
     }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $data['username'] = $this->getUsername();

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'username' => $data['username'],
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $input = $request->all();
        $validator = $this->validator($input);

        if ($validator->passes()) {
          $user = $this->create($input)->toArray();
          $user['link'] = str_random(60);

          DB::table('users_activations')->insert([
            'user_id'  => $user['id'],
            'activation_token'    => $user['link']
          ]);

          $wedding = new Wedding;

          $wedding->user_id = $user['id'];
          $wedding->wedding_url = $user['username'];

          $wedding->save();

          Mail::send('mail.activation', $user, function($message) use($user) {
            $message->to($user['email']);
            $message->subject('Esrive Invitation - Activation Code');
          });
          return redirect()
                ->route('login')
                ->with('success', "Register berhasil. Silakan cek email anda untuk aktivasi.");
        }
        return back()->with('error', $validator->errors());
    }

    /**
     * Handle a activation user
     */

     public function userActivation($token)
     {
       $check = DB::table('users_activations')->where('activation_token', $token)->first();

       if (!is_null($check))
       {
         $user = User::find($check->user_id);
         if ($user->activated == true)
         {
           return redirect()->route('login')->with('success', "Akun anda sudah aktif. Silakan login.");
         }
         $user->update(['activated' => true]);
         DB::table('users_activations')->where('activation_token', $token)->delete();
         return redirect()->route('login')->with('success', "Akun anda sudah berhasil diaktivasi. Silakan login.");
       }
       return redirect()->route('login')->with('warning', "Anda sudah melakukan aktivasi atau token anda tidak valid.");
     }
}
