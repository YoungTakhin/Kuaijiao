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

Route::get('/hahaha', 'DemoController@haha');

//Route::get('/login', 'DemoController@login');

Route::get('/login', function () {
	return view('login');
});

Route::get('/login', 'DemoController@login');

Route::get('/operation', 'DemoController@user');

Route::get('/teacher', 'DemoController@user');

Route::get('/student', 'DemoController@user');

Route::get('/selectStudent', 'DemoController@selectStudent');

Route::get('/selectTeacher', 'DemoController@selectTeacher');

Route::get('/insertStudent', function () {
	
	return view('insertStudent');
});

//Route::get('/insertTeacher', 'DemoController@insertTeacher');

//Route::('/operation', 'DemoController@selectStudent');

/*
Route::get('/operation', function () {
	return view('operation');
});
Route::get('/student', function () {
	return view('login');
});
Route::get('/teacher', function () {
	return view('login');
});
*/