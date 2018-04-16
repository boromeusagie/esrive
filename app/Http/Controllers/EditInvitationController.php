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

          Toastr::success('Password anda berhasil dirubah!');
          return redirect('/user/edit-data');
        }
        else
        {
          Toastr::warning('Masukkan password lama anda dengan benar!');
          return redirect('/user/edit-data');
        }
      }
    }
    else
    {
      return redirect('/user/edit-data');
    }
  }

  /**
   * EDIT DATA FREE USER
   */
   public function editDataFree(Request $request)
   {
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

     $user_id = Auth::user()->id;
     $wedding = Wedding::find($user_id);

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
   * EDIT DATA PRO USER
   */
   public function editData(Request $request)
   {
     $user_id = Auth::user()->id;
     $wedding = Wedding::find($user_id);

     $validator = Validator::make($request->all(), [
       'wedding_url' =>  'required|alpha_dash|min:4|unique:weddings,wedding_url,' . $wedding->id,
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

     $user_id = Auth::user()->id;
     $wedding = Wedding::find($user_id);

     $wedding->wedding_url = $request->input('wedding_url');
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

   public function groomProfile(Request $request)
    {
        $user = Auth::user();
        $wedding = Wedding::find($user->id);

        $width = $request->input('width_groom');
        $height = $request->input('height_groom');
        $x = $request->input('x_groom');
        $y = $request->input('y_groom');

        if($request->hasFile('groom_pic')) {
            $groom_pic = $request->file('groom_pic');
            $file_groom_pic = $user->username . '-groom-' . time() . '.' . $groom_pic->getClientOriginalExtension();
            $path = public_path('storage/user/'.$user->username.'/'.'img/' . $file_groom_pic);
            $image = Image::make($groom_pic);
            $image->crop($width, $height, $x, $y);
            $image->save($path);

            $wedding->groom_pic = $file_groom_pic;
            $wedding->save();
        }

        Toastr::success('Foto berhasil disimpan!', $title = null, $options = ["closeButton" => true, "positionClass" => "toast-top-center"]);
        return redirect('/user/data');
    }

    public function brideProfile(Request $request)
    {
        $user = Auth::user();
        $wedding = Wedding::find($user->id);

        $width = $request->input('width_bride');
        $height = $request->input('height_bride');
        $x = $request->input('x_bride');
        $y = $request->input('y_bride');

        if($request->hasFile('bride_pic')) {
            $bride_pic = $request->file('bride_pic');
            $file_bride_pic = $user->username . '-bride-' . time() . '.' . $bride_pic->getClientOriginalExtension();
            $path = public_path('storage/user/'.$user->username.'/'.'img/' . $file_bride_pic);
            $image = Image::make($bride_pic);
            $image->crop($width, $height, $x, $y);
            $image->save($path);

            $wedding->bride_pic = $file_bride_pic;
            $wedding->save();
        }

        Toastr::success('Foto berhasil disimpan!', $title = null, $options = ["closeButton" => true, "positionClass" => "toast-top-center"]);
            return redirect('/user/data');
    }
}
