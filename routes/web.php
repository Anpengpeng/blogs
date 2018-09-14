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
Route::get('hello', function () {
//    dd('q3e');
    return "Hello Laravel!";
});
Route::get('/test', 'TestController@index');
Route::get('test/get', 'TestController@get');

Route::match([ 'get', 'post' ], 'foo', function () {
    return "This is a post or get";
});
Route::any('mail/sendTo', 'MailController@sendTo');


Route::any('user/getUserInfo', 'UserController@getUserInfo');

Route::get('site/login', [ 'uses' => 'SiteController@login', 'as' => 'site.login' ]);
Route::post('site/dealLogin', [ 'uses' => 'SiteController@dealLogin', 'as' => 'site.deallogin' ]);

Route::middleware(['login.session'])->group(function () {
    Route::any('student/index', [ 'uses' => 'StudentController@index' ]);
    Route::any('student/add', [ 'uses' => 'StudentController@add' ]);
    Route::any('student/update/{id}', [ 'uses' => 'StudentController@update' ]);
    Route::any('student/delete/{id}', [ 'uses' => 'StudentController@delete' ]);
    Route::any('student/addHandle', [ 'uses' => 'StudentController@addHandle' ]);
    Route::any('student/upload', [ 'uses' => 'StudentController@upload' ]);

    Route::get('/index', [ 'uses' => 'BackendController@index', 'as' => 'backend.index' ]);
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
