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

Route::get('/', 'IndexController@welcome')->name('home');

# Register and Authentication routes
Route::get('/register', 'AuthController@register')->name('register.form');
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/register', 'AuthController@registration')->name('registration');
Route::post('/login', 'AuthController@authenticate')->name('authenticate');
Route::get('/logout', 'AuthController@logout')->name('logout');
Route::get('/restore-password', 'AuthController@restore_password')->name('restore.password');
Route::post('/restore-password', 'AuthController@restore')->name('restore');
Route::get('/forgot-email-sent', 'AuthController@forgot_email_sent')->name('forgot.email.sent');
Route::get('/forgot-email-wrong', 'AuthController@forgot_email_wrong')->name('forgot.email.wrong');

# Page of courses
Route::group(['middleware' => ['auth', 'course']], function(){
    Route::get('/course/{id}', 'CourseController@index')->name('web.course.index');
    Route::get('/course/{id}/lesson/{l_id}', 'LessonController@index')->name('web.lesson.index');
    Route::post('/course/{id}/lesson/{l_id}/testing', 'LessonController@testing')->name('web.lesson.testing');
});

Route::get('/api/question/{id}/answers', 'ApiController@question_answers');
Route::get('/api/test/{id}/lesson/{lesson_id}/result', 'ApiController@test_result');
