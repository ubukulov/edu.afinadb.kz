@extends('admin.dashboard')
@section('content')
    {{ Breadcrumbs::render('admin.lesson.edit', $course_id, $lesson) }}
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('lessons.update', ['course_id' => $course_id, 'id' => $lesson->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="course_id" value="{{ $course_id }}">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Редактировать курс - {{ $lesson->title }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Наименование</label>
                                <input type="text" class="form-control" value="{{ $lesson->title }}" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Описание</label>
                                <textarea id="inputDescription" name="full_description" class="form-control" rows="4">{!! $lesson->full_description !!}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="video">Загрузите видео</label> <br>
                                <strong style="color: red">Видео загружаем ручной. Наш хостинг ограничен! </strong>
                                <input type="file" disabled class="form-control" name="video" value="{{ $lesson->video }}">
                            </div>

                            @if(!is_null($lesson->video))
                                <div class="lesson-video">
                                    <video width="480" height="270" preload="none" controls controlsList="nodownload">
                                        <source src="{{ $lesson->video }}" type="video/mp4">
                                    </video>
                                </div>

                            @endif
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
