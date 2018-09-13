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
Route::get('/', ['as' => '/', 'uses' => 'SiteController@home']);
Route::post('auth', ['as' => 'auth', 'uses' => 'SiteController@auth']);
Route::post('order', ['as' => 'order', 'uses' => 'SiteController@order']);

Route::middleware(['guest'])->group(function () {
    Route::get('login', ['as' => 'login', 'uses' => 'SiteController@login']);
});

Route::middleware(['auth.admin'])->group(function () {
    Route::get('admin', ['as' => 'admin', 'uses' => 'SiteController@admin']);
    Route::get('logout', ['as' => 'logout', 'uses' => 'SiteController@logout']);
    Route::post('create-img', ['as' => 'create-img', 'uses' => 'SiteController@createImg']);
    Route::post('update-img', ['as' => 'update-img', 'uses' => 'SiteController@updateImg']);
    Route::post('delete-img', ['as' => 'delete-img', 'uses' => 'SiteController@deleteImg']);
});