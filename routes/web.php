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

//Route::get('/', function () {
//    return view('welcome');
//});
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

    Route::get('list-users', ['as' => 'getListUser', 'uses' => 'UserController@getListUser'])->middleware(['can:admin']);

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
        //add user
        Route::post('add',['as'=>'subject.addsubject','uses'=>'SubjectController@addsubject']);
        Route::post('duplicate',['as'=>'subject.postDuplicate','uses'=>'SubjectController@postDuplicate']);
        Route::post('edit/{id}', ['as' => 'subject.editsubject', 'uses' => 'SubjectController@postEdit']);
        Route::get('detail/{id}', ['as' => 'subject.getDetail', 'uses' => 'SubjectController@detail']);
        //Delete item
        Route::get('destroy/{id}', ['as' => 'subject.getDestroy', 'uses' => 'SubjectController@destroy']);
    });
    Route::group(['prefix' => 'class'], function () {
        Route::get('/', ['as' => 'class.index', 'uses' => 'ClassController@index']);
        Route::get('data', ['as' => 'class.data_json', 'uses' => 'ClassController@datajson']);
        //add user
        Route::post('add',['as'=>'class.addclass','uses'=>'ClassController@addclass']);
        Route::post('duplicate',['as'=>'class.postDuplicate','uses'=>'ClassController@postDuplicate']);
        Route::post('edit/{id}', ['as' => 'class.editclass', 'uses' => 'ClassController@postEdit']);
        Route::get('detail/{id}', ['as' => 'class.getDetail', 'uses' => 'ClassController@detail']);
        //Delete item
        Route::get('destroy/{id}', ['as' => 'class.getDestroy', 'uses' => 'ClassController@destroy']);
    });
    Route::group(['middleware' => ['can:admin']], function () {
        Route::group(['prefix' => 'point'], function () {
            Route::get('/', ['as' => 'point.index', 'uses' => 'PointController@index']);
            Route::get('data', ['as' => 'point.data_json', 'uses' => 'PointController@datajson']);

            //loadtable
            Route::get('/{id}', ['as' => 'point.monhoc.{id}', 'uses' => 'PointController@index']);
            //save điểm
            Route::post('save', ['as' => 'point.savediem', 'uses' => 'PointController@savediem']);
            //        //Delete item
            //        Route::get('destroy/{id}', ['as' => 'subject.getDestroy', 'uses' => 'SubjectController@destroy']);

        });
    });
    Route::group(['middleware' => ['can:user']], function () {
        Route::group(['prefix' => 'point-list'], function () {
            Route::get('/', ['as' => 'point-list.index', 'uses' => 'PointController@userindex']);
        });
    });
    Route::group(['prefix' => 'student'], function () {
        Route::get('/', ['as' => 'student.index', 'uses' => 'StudentController@index']);
        Route::get('data', ['as' => 'student.data_json', 'uses' => 'StudentController@datajson']);
        //add student
        Route::post('add',['as'=>'student.addstudent','uses'=>'StudentController@addstudent']);
        //export student
        Route::get('export',['as'=>'student.getexport','uses'=>'StudentController@getexport']);
        //Delete item
        Route::get('destroy/{id}', ['as' => 'student.getDestroy', 'uses' => 'StudentController@destroy']);
        Route::post('edit/{id}', ['as' => 'student.postEdit', 'uses' => 'StudentController@postEdit']);
        Route::get('detail/{id}', ['as' => 'student.getDetail', 'uses' => 'StudentController@detail']);
    });
    Route::group(['prefix' => 'lecturer'], function () {
        Route::get('/', ['as' => 'lecturer.index', 'uses' => 'LecturerController@index']);
        Route::get('data', ['as' => 'lecturer.data_json', 'uses' => 'LecturerController@datajson']);
        //add student
        Route::post('add',['as'=>'lecturer.addlecturer','uses'=>'LecturerController@addlecturer']);
//        //export student
//        Route::get('export',['as'=>'student.getexport','uses'=>'StudentController@getexport']);
        //Delete item
        Route::get('destroy/{id}', ['as' => 'lecturer.getDestroy', 'uses' => 'LecturerController@destroy']);
        Route::post('edit/{id}', ['as' => 'lecturer.postEdit', 'uses' => 'LecturerController@postEdit']);
        Route::get('detail/{id}', ['as' => 'lecturer.getDetail', 'uses' => 'LecturerController@detail']);
    });
    Route::group(['prefix' => 'studyagain'], function () {
        Route::get('/', ['as' => 'studyagain.index', 'uses' => 'StudyagainController@index']);
        Route::get('data', ['as' => 'studyagain.data_json', 'uses' => 'StudyagainController@datajson']);
    });
    Route::group(['prefix' => 'retest'], function () {
        Route::get('/', ['as' => 'retest.index', 'uses' => 'RetestController@index']);
        Route::get('data', ['as' => 'retest.data_json', 'uses' => 'RetestController@datajson']);
    });
    Route::group(['prefix' => 'studyresult'], function () {
        Route::get('/{lopid}/{namhoc}/{hocky}', ['uses' => 'StudyresultController@index']);
        //save hb
        Route::post('save', ['as' => 'studyresult.diemrl', 'uses' => 'StudyresultController@savediemrl']);
//        Route::get('data', ['as' => 'studyresult.data_json', 'uses' => 'StudyresultController@datajson']);
    });
    Route::group(['prefix' => 'scholarship'], function () {
        Route::get('/{namhoc}/{hocky}/{hocbong}', ['as' => 'scholarship.index','uses' => 'ScholarshipController@index']);
        //save hb
        Route::post('save', ['as' => 'scholarship.hocbong', 'uses' => 'ScholarshipController@savehocbong']);
//        Route::get('data', ['as' => 'studyresult.data_json', 'uses' => 'StudyresultController@datajson']);
    });
});
