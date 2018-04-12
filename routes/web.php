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
Route::post('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');
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

        //Route::post('logout', 'Auth\LoginController@userLogout')->name('user.logout');

        //Route::post('change-password', 'EditUserController@changePassword')->name('user.changepassword');
        //Route::post('save-data', 'EditUserController@saveData')->name('user.savedata');
    });
});

Route::prefix('admin')->group(function() {
    Route::get('/', function () {
      return redirect('admin/dashboard');
    });
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'AuthAdmin\LoginController@logout')->name('admin.logout');
    Route::get('/password/reset', 'AuthAdmin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/email', 'AuthAdmin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset/{token}', 'AuthAdmin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset', 'AuthAdmin\ResetPasswordController@reset');
});
