<?php
use App\User;
use App\Guest;

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
Route::get('paket', 'HomeController@paket')->name('home.paket');

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
        Route::post('save-url', 'EditInvitationController@saveUrl')->name('user.saveurl');
        Route::post('upload-profile', 'UserController@uploadProfile')->name('user.uploadprofile');
        Route::post('logout', 'Auth\LoginController@userLogout')->name('user.logout');
        Route::post('change-password', 'EditInvitationController@changePassword')->name('user.changepassword');
        Route::post('edit-profile', 'EditInvitationController@editProfile')->name('user.editprofile');
        Route::get('beli-paket', 'UserController@beliPaket')->name('user.belipaket');
        Route::post('order-paket', 'OrderController@orderPaket')->name('user.orderpaket');
        Route::group(['prefix' => 'transaksi'], function() {
          Route::get('/', 'UserController@daftarTransaksi')->name('user.daftartransaksi');
          Route::get('{order_id}', 'UserController@transaksi')->name('user.transaksi');
        });
        Route::get('cara-pembayaran', 'UserController@caraPembayaran')->name('user.carapembayaran');
        Route::post('snapfinish', 'SnapController@finish')->name('snap.finish');
    });
});

// Route::get('snap', 'SnapController@snap');
Route::get('snaptoken', 'SnapController@token');
// Route::post('snapfinish', 'SnapController@finish');
Route::get('notification', 'SnapController@notification')->name('notif.payment');

Route::get('pdf', function() {
  $user = App\User::find(1);
  $order = App\Order::find(1);
  return view('orders.pdf')->with(['user' => $user, 'order' => $order]);
});
Route::get('/sendpdf', 'OrderController@sendpdf');

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
      Route::get('daftar-tema', 'AdminController@daftarTema')->name('admin.daftartema');
      Route::post('logout', 'AuthAdmin\LoginController@logout')->name('admin.logout');
      Route::get('password/reset', 'AuthAdmin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
      Route::post('password/email', 'AuthAdmin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
      Route::get('password/reset/{token}', 'AuthAdmin\ResetPasswordController@showResetForm')->name('admin.password.reset');
      Route::post('password/reset', 'AuthAdmin\ResetPasswordController@reset');
      Route::get('admin-type', 'AdminController@adminType')->name('admin.type');
      Route::post('add-theme', 'AdminController@addTheme')->name('admin.addtheme');
  });
});

Route::get('{url}', 'InvitationController@index')->name('user.invitation');

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
    $theme = App\WeddingTheme::find($wedding->wedding_theme)->first();
    $guests = App\Guest::where('wedding_id', $wedding->id)->paginate(15);
    // $order = App\Order::find(['user_id' => $user->id])->first();
    $hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
    $bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

    $view->with([
      'user' => $user,
      'wedding' => $wedding,
      'guests' => $guests,
      'theme' => $theme,
      // 'order' => $order,
      'userimg' => Storage::url('public/user/' . $user->username . '/' . 'img/' . $user->user_img),
      'hari' => $hari,
      'bulan' => $bulan
    ]);

    // $hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
    // $bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
    //
    // $view->with([
    //   'hari' => $hari,
    //   'bulan' => $bulan
    // ]);
  }
});
