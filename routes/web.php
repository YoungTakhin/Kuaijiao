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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/hahaha', 'DemoController@haha');

Route::get('/login', function () {
	return view('login');
});

Route::get('/login', 'DemoController@login');

Route::get('/operation', 'DemoController@user');

Route::get('/teacher', 'DemoController@user');

Route::get('/student', 'DemoController@user');

//运维端
Route::get('/operation/selectStudent', 'DemoController@selectStudent');

Route::get('/operation/selectTeacher', 'DemoController@selectTeacher');

Route::get('/operation/selectCourse', 'DemoController@selectCourse');

Route::get('operation/insertStudent', function () {
	return view('/operation/insertStudent');
});

Route::post('/operation/insertStudent', 'DemoController@insertStudent');

Route::get('/operation/studentCourse', 'DemoController@studentCourse');

Route::post('/operation/insertStudentCourse', 'DemoController@insertStudentCourse');

Route::get('/operation/selectStudentCourse', 'DemoController@selectStudentCourse');

Route::post('/operation/deleteStudent', 'DemoController@deleteStudent');

Route::get('operation/insertTeacher', function () {
	return view('/operation/insertTeacher');
});

Route::post('/operation/insertTeacher', 'DemoController@insertTeacher');

Route::post('/operation/deleteTeacher', 'DemoController@deleteTeacher');

//教师端
Route::get('/teacher/selectCourse', 'TeacherController@selectCourse');

Route::get('/teacher/insertHomework', 'TeacherController@insertHomework');

Route::post('/teacher/upHomework', 'TeacherController@upHomework');

Route::get('/teacher/selectHomework', 'TeacherController@selectHomework');

Route::get('/teacher/downHomework', 'TeacherController@downHomework');

Route::post('/teacher/deleteHomework', 'TeacherController@deleteHomework');

//学生端
Route::get('/student/selectCourse', 'StudentController@selectCourse');

Route::get('/student/selectHomework', 'StudentController@selectHomework');

Route::post('/student/upHomework', 'StudentController@upHomework');

Route::get('/student/downHomework', 'StudentController@downHomework');

//Route::get('/insertStudent', 'DemoController@selectTeacher');

//Route::get('/insertStudent/insert', 'DemoController@insertStudent');

Route::get('/student/test', 'StudentController@test');


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