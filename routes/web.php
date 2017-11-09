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

Route::get('/',['as'=>'index','uses'=>'PagesController@index'])->middleware('login');
Route::get('lish-users',['as'=>'getLishUser','uses'=>'PagesController@getLishUser']);
Route::group(['prefix' => 'admin'], function () {
    Route::get('login',['as'=>'admin.getLogin','uses'=>'UserController@getLogin']);
    Route::post('login',['as'=>'admin.postLogin','uses'=>'UserController@postLogin']);
    Route::get('logout',['as'=>'admin.getLogout','uses'=>'UserController@getLogout']);

    Route::get('register',['as'=>'admin.getRegister','uses'=>'UserController@getRegister']);
    Route::post('register',['as'=>'admin.postRegister','uses'=>'UserController@postRegister']);
    Route::post('duplicateuser',['as'=>'admin.postDuplicateuser','uses'=>'UserController@postDuplicateuser']);

//    Route::get('lockscreen',['as'=>'admin.getLockscreen','uses'=>'UserController@getLockscreen']);
    Route::post('lockscreen',['as'=>'admin.postLockscreen','uses'=>'UserController@postLockscreen']);
});