@extends('admin.dashboard')
@section('content')
    {{ Breadcrumbs::render('admin.lesson.create', $course_id) }}
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('lessons.store', ['course_id' => $course_id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="course_id" value="{{ $course_id }}">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Создать урок</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Наименование</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Описание</label>
                            <textarea id="inputDescription" name="full_description" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="video">Загрузите видео</label><br>
                            <strong style="color: red">Видео загружаем ручной. Наш хостинг ограничен! </strong>
                            <input type="file" disabled class="form-control" name="video">
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <input type="submit" value="Создать" class="btn btn-success">
            </form>

        </div>
    </div>
@stop
