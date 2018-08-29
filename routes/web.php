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

Route::match(['get', 'post'], 'foo', function (){
   return "This is a post or get";
});
Route::any('mail/sendTo','MailController@sendTo');


Route::any('user/getUserInfo', 'UserController@getUserInfo');
Route::any('student/index', ['uses'=> 'StudentController@index'])->middleware('login.session');
Route::any('student/add', ['uses'=> 'StudentController@add'])->middleware('login.session');
Route::any('student/update/{id}', ['uses'=> 'StudentController@update'])->middleware('login.session');
Route::any('student/delete/{id}', ['uses'=> 'StudentController@delete'])->middleware('login.session');
Route::any('student/addHandle', ['uses'=> 'StudentController@addHandle'])->middleware('login.session');
Route::any('student/upload', ['uses'=> 'StudentController@upload'])->middleware('login.session');
Route::get('site/login', ['uses'=> 'SiteController@login']);
Route::post('site/dealLogin','SiteController@dealLogin');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
