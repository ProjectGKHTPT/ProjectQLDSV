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

    Route::get('lockscreen',['as'=>'admin.getLockscreen','uses'=>'UserController@getLockscreen']);
    Route::post('lockscreen',['as'=>'admin.postLockscreen','uses'=>'UserController@postLockscreen']);

    Route::get('forgot-password',['as'=>'admin.getForgotPassword','uses'=>'UserController@getForgotPassword']);
    Route::post('forgot-password',['as'=>'admin.postForgotPassword','uses'=>'UserController@postForgotPassword']);
    Route::get('check-code-email',['as'=>'admin.getCheckCodeEmail','uses'=>'UserController@getCheckCodeEmail']);
    Route::post('check-code-email',['as'=>'admin.postCheckCodeEmail','uses'=>'UserController@postCheckCodeEmail']);

//    Route::get('lockscreen',['as'=>'admin.getLockscreen','uses'=>'UserController@getLockscreen']);
    Route::post('lockscreen',['as'=>'admin.postLockscreen','uses'=>'UserController@postLockscreen']);
});
Route::group(['middleware' => ['login']], function () {
    Route::get('/',['as'=>'index','uses'=>'PagesController@index']);

    Route::get('list-users', ['as' => 'getListUser', 'uses' => 'UserController@getListUser'])->middleware(['can:level']);

    //add user
    Route::post('add',['as'=>'adduser','uses'=>'UserController@adduser']);
    //edit user
    Route::get('data', ['as' => 'data_json', 'uses' => 'UserController@datajson']);
    Route::post('edit/{id}', ['as' => 'postEdit', 'uses' => 'UserController@postEdit']);
    Route::get('detail/{id}', ['as' => 'getDetail', 'uses' => 'UserController@detail']);
    //Delete item
    Route::get('destroy/{id}', ['as' => 'getDestroy', 'uses' => 'UserController@destroy']);

    Route::get('information-user', ['as' => 'getInformationUser', 'uses' => 'UserController@getInformationUser']);
    Route::post('editinformation', ['as' => 'postInformation', 'uses' => 'UserController@postInformation']);

    Route::group(['prefix' => 'subject'], function () {
        Route::get('/', ['as' => 'subject.index', 'uses' => 'SubjectController@index']);
        Route::get('data', ['as' => 'subject.data_json', 'uses' => 'SubjectController@datajson']);
        //Delete item
        Route::get('destroy/{id}', ['as' => 'subject.getDestroy', 'uses' => 'SubjectController@destroy']);
    });
    Route::group(['prefix' => 'point'], function () {
        Route::get('/', ['as' => 'point.index', 'uses' => 'PointController@index']);
        Route::get('data', ['as' => 'point.data_json', 'uses' => 'PointController@datajson']);
//        //Delete item
//        Route::get('destroy/{id}', ['as' => 'subject.getDestroy', 'uses' => 'SubjectController@destroy']);
    });
    Route::group(['prefix' => 'student'], function () {
        Route::get('/', ['as' => 'student.index', 'uses' => 'StudentController@index']);
        Route::get('data', ['as' => 'student.data_json', 'uses' => 'StudentController@datajson']);
        //add student
        Route::post('add',['as'=>'student.addstudent','uses'=>'StudentController@addstudent']);

//        //Delete item
//        Route::get('destroy/{id}', ['as' => 'subject.getDestroy', 'uses' => 'SubjectController@destroy']);
    });
});
