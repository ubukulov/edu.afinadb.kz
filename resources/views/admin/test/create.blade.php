@extends('admin.dashboard')
@section('content')
    {{ Breadcrumbs::render('admin.test.create', $course_id, $lesson_id) }}
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('test.store', ['course_id' => $course_id, 'lesson_id' => $lesson_id]) }}" method="post">
                    @csrf
                    <input type="hidden" name="lesson_id" value="{{ $lesson_id }}">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Создать тест</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Наименование</label>
                                <input type="text" class="form-control" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="type">Укажите тип</label>
                                <select id="type" name="type" class="form-control">
                                    <option value="1">Закрытый тест - с вариантами ответов</option>
                                    <option value="2">Открытый тест - пользователь пишут от руки</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <input type="submit" value="Создать" class="btn btn-success">
                </form>

            </div>
        </div>
    </section>
@stop
