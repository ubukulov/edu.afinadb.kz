@extends('admin.dashboard')
@section('content')
    {{ Breadcrumbs::render('admin.lesson.index') }}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><strong>{{ $course->title }}</strong> - Список уроков</h3>

            <div class="card-tools">
                <a href="{{ route('lessons.create', ['course_id' => $course->id]) }}" class="btn btn-default"><i class="fa fa-edit"></i>&nbsp;Добавить урок</a>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                <tr>
                    <th style="width: 1%">
                        #
                    </th>
                    <th style="width: 20%">
                        Наименование
                    </th>
                    {{--<th style="width: 30%">
                        Team Members
                    </th>
                    <th>
                        Project Progress
                    </th>
                    <th style="width: 8%" class="text-center">
                        Status
                    </th>--}}
                    <th style="width: 20%">
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($lessons as $lesson)
                <tr>
                    <td>
                        #{{ $lesson->id }}
                    </td>
                    <td>
                        <a>
                            {{ $lesson->title }}
                        </a>
                        <br>
                        <small>
                            Дата: {{ $lesson->created_at->format('d.m.Y') }}
                        </small>
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('test.index', ['course_id' => $course->id, 'lesson_id' => $lesson->id]) }}">
                            <i class="fas fa-folder">
                            </i>
                            Тест
                        </a>
                        <a class="btn btn-info btn-sm" href="{{ route('lessons.edit', ['course_id' => $course->id, 'lesson_id' => $lesson->id]) }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Ред.
                        </a>
                        <button onclick="confirm('Вы хотите удалить?') ? window.location = $(this).attr('data-url') : $(this).preventDefault();" class="btn btn-danger btn-sm" data-url="{{ route('lessons.destroy', ['course_id' => $course->id, 'lesson_id' => $lesson->id]) }}">
                            <i class="fas fa-trash">
                            </i>
                            Удалить
                        </button>
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@stop
