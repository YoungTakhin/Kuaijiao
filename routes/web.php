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

Route::get('/login', 'DemoController@login');

Route::get('/login', function () {
	return view('login');
});



Route::get('/login', 'DemoController@login');

Route::get('/operation', function () {
	return view('login');
});

Route::get('/student', function () {
	return view('login');
});

Route::get('/teacher', function () {
	return view('login');
});