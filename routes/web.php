<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', 'Auth\AuthController@loginPage');
Route::get('/auth-user', 'Auth\AuthController@loginPage');
Route::post('/auth-user', 'Auth\AuthController@loginUser')->name('user.auth');


Auth::routes();
Route::get('/logout', 'Auth\AuthController@logoutUser')->name('user.logout');
// Admin
Route::get('admin', 'Admin\AdminController@index');
Route::resource('admin/student', 'Admin\\StudentController');
Route::resource('admin/teacher', 'Admin\\TeacherController');
Route::resource('admin/class', 'Admin\\ClassController');
Route::resource('admin/class-group', 'Admin\\ClassGroupController');
Route::resource('admin/student-class-group', 'Admin\\StudentClassGroupController');
Route::resource('admin/subject', 'Admin\\SubjectController');
Route::resource('admin/enrollment', 'Admin\\EnrollmentController');
Route::resource('admin/mark', 'Admin\\MarkController');
Route::resource('admin/announcement', 'Admin\\AnnouncementController');

// Teacher
Route::get('teacher', 'Teacher\TeacherController@index');
Route::get('teacher/enrollment', 'Teacher\TeacherController@enrollment');
Route::get('teacher/enrollment/{id}', 'Teacher\TeacherController@enrollmentDetail');
Route::post('teacher/enrollment/mark/{id}', 'Teacher\TeacherController@giveMark')->name('give.mark');
Route::post('teacher/enrollment/mark/edit/{id}', 'Teacher\TeacherController@editMark')->name('edit.mark');

// Student
Route::get('student', 'Student\StudentController@index');
Route::get('student/enrollment', 'Student\StudentController@enrollment');
Route::get('student/report', 'Student\StudentController@report')->name('report.enrollment');
Route::get('student/profile', 'Student\StudentController@getProfile');
Route::post('student/profile', 'Student\StudentController@updateProfile');
