<?php

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Resources\AdminResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api-admin', function() {

//});
Route::get('admins', function () {
    return AdminResource(Admin::find(1));
});
