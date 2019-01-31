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
Route::group(['middleware' => ['web']], function () {
    Route::post('login','BackendController@login');
    Route::post('save_register','BackendController@register');
    Route::post('logout','BackendController@logout');
    Route::get('/', "BackendController@view_login");
    Route::get('/profile', "BackendController@view_profile");
    Route::get('/register', "BackendController@view_register");
});