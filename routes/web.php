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
    return "Hello Laravel!";
});
Route::get('/test', 'TestController@index');

Route::match(['get', 'post'], 'foo', function (){
   return "This is a post or get";
});

Route::get('/from', function (){
   return view('from', ['website' => '学习laravel']);
});
Route::view('from', 'from', ['website' => '学习laravel']);

Route::any('user/getUserInfo', 'UserController@getUserInfo');

Route::any('student/index', ['uses'=> 'StudentController@index']);

Route::any('student/add', ['uses'=> 'StudentController@add']);

Route::any('student/update/{id}', ['uses'=> 'StudentController@update']);

Route::any('student/delete/{id}', ['uses'=> 'StudentController@delete']);

Route::any('student/addHandle', ['uses'=> 'StudentController@addHandle']);

Route::any('student/upload', ['uses'=> 'StudentController@upload']);

Route::any('login/login', ['uses'=> 'LoginController@login']);