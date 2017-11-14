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
Route::group(['prefix' => 'admin'], function () {
    Route::get('login',['as'=>'admin.getLogin','uses'=>'UserController@getLogin']);
    Route::post('login',['as'=>'admin.postLogin','uses'=>'UserController@postLogin']);
    Route::get('logout',['as'=>'admin.getLogout','uses'=>'UserController@getLogout']);

    Route::get('register',['as'=>'admin.getRegister','uses'=>'UserController@getRegister']);
    Route::post('register',['as'=>'admin.postRegister','uses'=>'UserController@postRegister']);
    Route::post('duplicateemail',['as'=>'admin.postDuplicateemail','uses'=>'UserController@postDuplicateemail']);

//    Route::get('lockscreen',['as'=>'admin.getLockscreen','uses'=>'UserController@getLockscreen']);
    Route::post('lockscreen',['as'=>'admin.postLockscreen','uses'=>'UserController@postLockscreen']);
});
Route::group(['middleware' => ['login']], function () {
    Route::get('/',['as'=>'index','uses'=>'PagesController@index']);

    Route::get('list-users', ['as' => 'getListUser', 'uses' => 'UserController@getListUser'])->middleware(['can:level']);
    Route::get('data', ['as' => 'data_json', 'uses' => 'UserController@datajson']);
    //add user
    Route::post('add',['as'=>'adduser','uses'=>'UserController@adduser']);
    //edit user
    Route::post('edit/{id}', ['as' => 'postEdit', 'uses' => 'UserController@postEdit']);
    Route::get('detail/{id}', ['as' => 'getDetail', 'uses' => 'UserController@detail']);
    //Delete item
    Route::get('destroy/{id}', ['as' => 'getDestroy', 'uses' => 'UserController@destroy']);

    Route::get('information-user', ['as' => 'getInformationUser', 'uses' => 'UserController@getInformationUser']);
    Route::post('editinformation', ['as' => 'postInformation', 'uses' => 'UserController@postInformation']);
});
