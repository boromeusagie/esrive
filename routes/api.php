<?php

Route::group(['prefix' => '1.0.0'], function () {
  Route::apiResource('/admins', 'Api\AdminController');

  Route::apiResource('/users', 'Api\UserController');

  Route::group(['prefix' => 'users'], function () {
    Route::apiResource('{user}/wedding', 'Api\WeddingController');
  });
});
