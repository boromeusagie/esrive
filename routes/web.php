<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/user/activation/{token}', 'Auth\RegisterController@userActivation');

//Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'], function() {
    Route::group(['prefix' => 'user'], function () {
        Route::get('dashboard', 'UserController@index')->name('user.dashboard');
        Route::get('data', 'UserController@data')->name('user.data');
        Route::post('edit-data', 'EditInvitationController@editData')->name('user.editdata');
        Route::post('edit-data-free', 'EditInvitationController@editDataFree')->name('user.editdatafree');
        Route::get('pilih-tema', 'UserController@pilihTema')->name('user.pilihtema');
        Route::get('edit-tema', 'UserController@editTema')->name('user.edittema');
        Route::get('daftar-tamu', 'UserController@daftarTamu')->name('user.daftartamu');
        Route::get('ucapan-selamat', 'UserController@ucapanSelamat')->name('user.ucapanselamat');
        Route::get('galeri-foto', 'UserController@galeriFoto')->name('user.galerifoto');
        Route::post('groom-pic', 'EditInvitationController@groomProfile')->name('user.groompic');
        Route::post('bride-pic', 'EditInvitationController@brideProfile')->name('user.bridepic');
        Route::get('profile', 'UserController@profile')->name('user.profile');
        Route::post('upload-profile', 'UserController@uploadProfile')->name('user.uploadprofile');
        Route::post('logout', 'Auth\LoginController@userLogout')->name('user.logout');

        //Route::post('logout', 'Auth\LoginController@userLogout')->name('user.logout');

        //Route::post('change-password', 'EditUserController@changePassword')->name('user.changepassword');
        //Route::post('save-data', 'EditUserController@saveData')->name('user.savedata');
    });
});

Route::get('es-admin', function() {
  return redirect('es-admin/login');
});
Route::get('es-admin/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
Route::post('es-admin/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');

Route::group(['middleware' => 'auth:admin'], function () {
  Route::prefix('es-admin')->group(function() {
      Route::get('dashboard', 'AdminController@index')->name('admin.dashboard');
      Route::get('daftar-admin', 'AdminController@daftarAdmin')->name('admin.daftaradmin');
      Route::get('daftar-user', 'AdminController@daftarUser')->name('admin.daftaruser');
      Route::post('logout', 'AuthAdmin\LoginController@logout')->name('admin.logout');
      Route::get('password/reset', 'AuthAdmin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
      Route::post('password/email', 'AuthAdmin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
      Route::get('password/reset/{token}', 'AuthAdmin\ResetPasswordController@showResetForm')->name('admin.password.reset');
      Route::post('password/reset', 'AuthAdmin\ResetPasswordController@reset');
  });
});

View::composer(['*'], function ($view) {
  if (Auth::guard('admin')->check()) {
    $admin = Auth::user();

    $view->with([
      'admin' => $admin
    ]);
  }
  if (Auth::guard()->check()) {
    $user = Auth::user();
    $wedding = App\Wedding::find(['user_id' => $user->id])->first();

    $view->with([
      'user' => $user,
      'wedding' => $wedding,
      'userimg' => Storage::url('public/user/' . $user->username . '/' . 'img/' . $user->user_img)
    ]);
  }
});
