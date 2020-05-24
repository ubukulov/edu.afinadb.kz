<?php
// Главная
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Главная', route('home'));
});

// Курс
Breadcrumbs::register('course.view', function ($breadcrumbs, $course) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push($course->title);
});

// Урок
Breadcrumbs::register('lesson.view', function ($breadcrumbs, $course, $lesson) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push($course->title, route('web.course.index', ['id' => $course->id]));
    $breadcrumbs->push($lesson->title);
});

// Авторизация
Breadcrumbs::register('login.form', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Войти в личный кабинет');
});

// Регистрация
Breadcrumbs::register('register.form', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Зарегистрироваться');
});

########################################################################################################################
Breadcrumbs::register('admin', function ($breadcrumbs) {
    if (\Route::currentRouteName() == 'admin.dashboard') {
        $breadcrumbs->push('Панель');
    } else {
        $breadcrumbs->push('Панель', route('admin.dashboard'));
    }
});
Breadcrumbs::register('admin.course.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Курсы');
});
Breadcrumbs::register('admin.course.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Курсы', route('courses.index'));
    $breadcrumbs->push('Добавить курс');
});
Breadcrumbs::register('admin.course.edit', function ($breadcrumbs, $course) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Курсы', route('courses.index'));
    $breadcrumbs->push($course->title);
});
Breadcrumbs::register('admin.course.users', function ($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Курсы', route('courses.index'));
    $breadcrumbs->push('Пользователи');
});
Breadcrumbs::register('admin.lesson.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Курсы', route('courses.index'));
    $breadcrumbs->push('Уроки');
});
Breadcrumbs::register('admin.lesson.create', function ($breadcrumbs, $course_id) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Курсы', route('courses.index'));
    $breadcrumbs->push('Уроки', route('lessons.index', ['course_id' => $course_id]));
    $breadcrumbs->push('Добавить урок');
});
Breadcrumbs::register('admin.lesson.edit', function ($breadcrumbs, $course_id, $lesson) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Курсы', route('courses.index'));
    $breadcrumbs->push('Уроки', route('lessons.index', ['course_id' => $course_id]));
    $breadcrumbs->push($lesson->title);
});
Breadcrumbs::register('admin.test.index', function ($breadcrumbs, $course_id) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Курсы', route('courses.index'));
    $breadcrumbs->push('Уроки', route('lessons.index', ['course_id' => $course_id]));
    $breadcrumbs->push('Тесты');
});
Breadcrumbs::register('admin.test.create', function ($breadcrumbs, $course_id, $lesson_id) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Курсы', route('courses.index'));
    $breadcrumbs->push('Уроки', route('lessons.index', ['course_id' => $course_id]));
    $breadcrumbs->push('Тесты', route('test.index', ['course_id' => $course_id, 'lesson_id' => $lesson_id]));
    $breadcrumbs->push('Добавить тест');
});
Breadcrumbs::register('admin.test.edit', function ($breadcrumbs, $course_id, $lesson_id, $test) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Курсы', route('courses.index'));
    $breadcrumbs->push('Уроки', route('lessons.index', ['course_id' => $course_id]));
    $breadcrumbs->push('Тесты', route('test.index', ['course_id' => $course_id, 'lesson_id' => $lesson_id]));
    $breadcrumbs->push($test->title);
});
Breadcrumbs::register('admin.question.index', function ($breadcrumbs, $course_id, $lesson_id, $test) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Курсы', route('courses.index'));
    $breadcrumbs->push('Уроки', route('lessons.index', ['course_id' => $course_id]));
    $breadcrumbs->push('Тесты', route('test.index', ['course_id' => $course_id, 'lesson_id' => $lesson_id]));
    $breadcrumbs->push('Вопросы');
});
Breadcrumbs::register('admin.question.create', function ($breadcrumbs, $course_id, $lesson_id, $test) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Курсы', route('courses.index'));
    $breadcrumbs->push('Уроки', route('lessons.index', ['course_id' => $course_id]));
    $breadcrumbs->push('Тесты', route('test.index', ['course_id' => $course_id, 'lesson_id' => $lesson_id]));
    $breadcrumbs->push('Вопросы', route('questions.index', ['course_id' => $course_id, 'lesson_id' => $lesson_id, 'test_id' => $test->id]));
    $breadcrumbs->push('Добавить вопрос');
});
Breadcrumbs::register('admin.question.edit', function ($breadcrumbs, $course_id, $lesson_id, $test) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Курсы', route('courses.index'));
    $breadcrumbs->push('Уроки', route('lessons.index', ['course_id' => $course_id]));
    $breadcrumbs->push('Тесты', route('test.index', ['course_id' => $course_id, 'lesson_id' => $lesson_id]));
    $breadcrumbs->push('Вопросы', route('questions.index', ['course_id' => $course_id, 'lesson_id' => $lesson_id, 'test_id' => $test->id]));
    $breadcrumbs->push('Ред. вопрос');
});
Breadcrumbs::register('admin.question.answers', function ($breadcrumbs, $course_id, $lesson_id, $test) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Курсы', route('courses.index'));
    $breadcrumbs->push('Уроки', route('lessons.index', ['course_id' => $course_id]));
    $breadcrumbs->push('Тесты', route('test.index', ['course_id' => $course_id, 'lesson_id' => $lesson_id]));
    $breadcrumbs->push('Вопросы', route('questions.index', ['course_id' => $course_id, 'lesson_id' => $lesson_id, 'test_id' => $test->id]));
    $breadcrumbs->push('Ответы к вопросу');
});
Breadcrumbs::register('admin.users.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Список пользователей');
});
Breadcrumbs::register('admin.users.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Список пользователей', route('users.index'));
    $breadcrumbs->push('Добавить пользователь');
});
