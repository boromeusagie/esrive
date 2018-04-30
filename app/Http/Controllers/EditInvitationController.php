<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\UserType;
use App\User;
use App\Wedding;
use Validator;
use Auth;
use Image;
use Alert;
use Response;
use Hash;
use Toastr;

class EditInvitationController extends Controller
{
  /**
  * Change Password
  *
  **/

  public function admin_credential_rules(array $data)
  {
    $messages = [
      'oldpassword.required' => 'Masukkan password lama anda',
      'password.required' => 'Masukkan password baru anda',
    ];

    $validator = Validator::make($data, [
      'oldpassword' => 'required',
      'password' => 'required|same:password',
      'password_confirmation' => 'required|same:password',
    ], $messages);

    return $validator;
  }

  public function changePassword(Request $request, $token = null)
  {
    if(Auth::check())
    {
      $request_data = $request->all();
      $validator = $this->admin_credential_rules($request_data);
      if($validator->fails())
      {
          Toastr::error('Error! Tidak bisa mengubah password anda.');
          return redirect('/user/edit-data');
      }
      else
      {
        $oldpassword = Auth::user()->password;
        if(Hash::check($request_data['oldpassword'], $oldpassword))
        {
          $user_id = Auth::user()->id;
          $obj_user = User::find($user_id);
          $obj_user->password = Hash::make($request_data['password']);;
          $obj_user->save();

          Toastr::success($message = 'Password anda berhasil dirubah!', $title = null, $options = ["closeButton" => true, "positionClass" => "toast-top-center"]);
          return redirect('/user/profile');
        }
        else
        {
          Toastr::warning($message = 'Masukkan password lama anda dengan benar!', $title = null, $options = ["closeButton" => true, "positionClass" => "toast-top-center"]);
          return redirect('/user/profile')->withErrors($validator)->withInput();
        }
      }
    }
    else
    {
      return redirect('/user/profile');
    }
  }

  /**
   * EDIT DATA WEDDING
   */
   public function editData(Request $request)
   {
     $user_id = Auth::user()->id;
     $wedding = Wedding::find($user_id);

     $validator = Validator::make($request->all(), [
       'groom_full' => 'required|max:255',
       'groom_nick' => 'required|max:255',
       'bride_full' => 'required|max:255',
       'bride_nick' => 'required|max:255',
       'groom_profile' => 'required|max:500',
       'bride_profile' => 'required|max:500',
       'wedding_cer' => 'required',
       'wedding_cer_date' => 'required',
       'wedding_cer_begin' => 'required',
       'wedding_cer_end' => 'required',
       'wedding_cer_place' => 'required',
       'wedding_cer_address' => 'required',
       'wedding_cer_lat' => 'required',
       'wedding_cer_long' => 'required',
       'wedding_rec' => 'required',
       'wedding_rec_date' => 'required',
       'wedding_rec_begin' => 'required',
       'wedding_rec_end' => 'required',
       'wedding_rec_place' => 'required',
       'wedding_rec_address' => 'required',
       'wedding_rec_lat' => 'required',
       'wedding_rec_long' => 'required'
     ]);

     $errors = $validator->errors();

     if($validator->fails()) {
       Toastr::error($message = 'Gagal disimpan!', $title = null, $options = ["closeButton" => true, "positionClass" => "toast-top-center"]);
       return redirect('/user/data')->withErrors($validator)->withInput();
     }

     $wedding->groom_full = $request->input('groom_full');
     $wedding->groom_nick = $request->input('groom_nick');
     $wedding->groom_profile = $request->input('groom_profile');
     $wedding->bride_full = $request->input('bride_full');
     $wedding->bride_nick = $request->input('bride_nick');
     $wedding->bride_profile = $request->input('bride_profile');
     $wedding->wedding_cer = $request->input('wedding_cer');
     $wedding->wedding_cer_date = $request->input('wedding_cer_date');
     $wedding->wedding_cer_begin = $request->input('wedding_cer_begin');
     $wedding->wedding_cer_end = $request->input('wedding_cer_end');
     $wedding->wedding_cer_place = $request->input('wedding_cer_place');
     $wedding->wedding_cer_address = $request->input('wedding_cer_address');
     $wedding->wedding_cer_lat = $request->input('wedding_cer_lat');
     $wedding->wedding_cer_long = $request->input('wedding_cer_long');
     $wedding->wedding_rec = $request->input('wedding_rec');
     $wedding->wedding_rec_date = $request->input('wedding_rec_date');
     $wedding->wedding_rec_begin = $request->input('wedding_rec_begin');
     $wedding->wedding_rec_end = $request->input('wedding_rec_end');
     $wedding->wedding_rec_place = $request->input('wedding_rec_place');
     $wedding->wedding_rec_address = $request->input('wedding_rec_address');
     $wedding->wedding_rec_lat = $request->input('wedding_rec_lat');
     $wedding->wedding_rec_long = $request->input('wedding_rec_long');

     $wedding->save();

     Toastr::success($message = 'Berhasil disimpan!', $title = null, $options = ["closeButton" => true, "positionClass" => "toast-top-center"]);
     return redirect('/user/data');
   }

   /**
    * UPLOAD GROOM PIC
    */
   public function groomProfile(Request $request)
    {
        $user = Auth::user();
        $wedding = Wedding::find($user->id);

        $groom_pic = $request->image;
        $file_groom_pic = $user->username . '-groom-' . time() . '.png';
        $path = public_path('storage/user/'.$user->username.'/'.'img/' . $file_groom_pic);
        $image = Image::make($groom_pic);
        $image->save($path);

        $wedding->groom_pic = $file_groom_pic;
        $wedding->save();

        return response(null, 202);
    }

    /**
     * UPLOAD BRIDE PIC
     */
    public function brideProfile(Request $request)
    {
        $user = Auth::user();
        $wedding = Wedding::find($user->id);

        $bride_pic = $request->image;
        $file_bride_pic = $user->username . '-bride-' . time() . '.png';
        $path = public_path('storage/user/'.$user->username.'/'.'img/' . $file_bride_pic);
        $image = Image::make($bride_pic);
        $image->save($path);

        $wedding->bride_pic = $file_bride_pic;
        $wedding->save();

        return response(null, 202);
    }

    /**
     * EDIT URL
     */
    public function saveUrl(Request $request)
    {
      $user_id = Auth::user()->id;
      $wedding = Wedding::find($user_id);

      $validator = Validator::make($request->all(), [
        'wedding_url' =>  'required|alpha_dash|min:4|unique:weddings,wedding_url,' . $wedding->id
      ]);

      $errors = $validator->errors();

      if($validator->fails()) {
        Toastr::error($message = 'URL Gagal disimpan!', $title = null, $options = ["closeButton" => true, "positionClass" => "toast-top-center"]);
        return redirect('/user/data')->withErrors($validator)->withInput();
      }

      $wedding->wedding_url = $request->input('wedding_url');

      $wedding->save();

      Toastr::success($message = 'URL Berhasil disimpan!', $title = null, $options = ["closeButton" => true, "positionClass" => "toast-top-center"]);
      return redirect('/user/data');
    }

    /**
     * EDIT PROFILE
     */
    public function editProfile(Request $request)
    {
      $user = Auth::user();

      $validator = Validator::make($request->all(), [
        'name' =>  'required|max:255'
      ]);

      $errors = $validator->errors();

      if($validator->fails()) {
        Toastr::error($message = 'Gagal disimpan!', $title = null, $options = ["closeButton" => true, "positionClass" => "toast-top-center"]);
        return redirect('/user/profile')->withErrors($validator)->withInput();
      }

      $user->name = $request->input('name');

      $user->save();

      Toastr::success($message = 'Berhasil disimpan!', $title = null, $options = ["closeButton" => true, "positionClass" => "toast-top-center"]);
      return redirect('/user/profile');
    }
}
