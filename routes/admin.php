<?php
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function(){
    Route::group(['middleware' => ['auth', 'admin']], function(){
        Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');
        Route::resource('/courses', 'CourseController');
        Route::resource('/courses/{course_id}/lessons', 'LessonController');

        Route::get('/courses/{course_id}/lessons/{lesson_id}/tests', 'TestController@index')->name('test.index');
        Route::get('/courses/{course_id}/lessons/{lesson_id}/tests/create', 'TestController@create')->name('test.create');
        Route::get('/courses/{course_id}/lessons/{lesson_id}/tests/{test_id}/edit', 'TestController@edit')->name('test.edit');
        Route::post('/courses/{course_id}/lessons/{lesson_id}/tests/store', 'TestController@store')->name('test.store');
        Route::match(['put', 'patch'], '/courses/{course_id}/lessons/{lesson_id}/tests/{test_id}/update', 'TestController@update')->name('test.update');
        Route::get('/courses/{course_id}/lessons/{lesson_id}/tests/{test_id}/destroy', 'TestController@destroy')->name('test.destroy');

//        Route::resource('/tests', 'TestController');
        Route::resource('/courses/{course_id}/lessons/{lesson_id}/tests/{test_id}/questions', 'QuestionController')->except(['show', 'destroy']);
        Route::get('/courses/{course_id}/lessons/{lesson_id}/tests/{test_id}/questions/{question_id}/destroy', 'QuestionController@destroy')->name('questions.destroy');

        Route::resource('/users', 'UserController');
        Route::get('/courses/{id}/users', 'AdminController@course')->name('access.course.index');
        Route::get('/courses/{id}/user/{user_id}', 'AdminController@access_to_course')->name('access.course');
        Route::get('/courses/{course_id}/lessons/{lesson_id}/tests/{test_id}/questions/{question_id}/answers', 'QuestionController@answers')->name('q.answers');
        Route::post('/question/{answer_id}/right', 'QuestionController@answers_check')->name('q.answers.check');
    });
});
