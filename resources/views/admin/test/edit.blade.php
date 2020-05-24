@extends('admin.dashboard')
@section('content')
    {{ Breadcrumbs::render('admin.test.edit', $course_id, $lesson_id, $test) }}
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('test.update', ['course_id' => $course_id, 'lesson_id' => $lesson_id, 'test_id' => $test->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="lesson_id" value="{{ $lesson_id }}">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Редактировать тест - {{ $test->title }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Наименование</label>
                                <input type="text" class="form-control" value="{{ $test->title }}" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="type">Укажите тип</label>
                                <select @if(count($test->questions) > 0) disabled @endif id="type" name="type" class="form-control">
                                    <option @if($test->type == 1) selected @endif value="1">Закрытый тест - с вариантами ответов</option>
                                    <option @if($test->type == 2) selected @endif value="2">Открытый тест - пользователь пишут от руки</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <input type="submit" value="Обновить" class="btn btn-success">
                </form>

            </div>
        </div>
    </section>
@stop
