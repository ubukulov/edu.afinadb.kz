@extends('admin.dashboard')
@section('content')
    {{ Breadcrumbs::render('admin.test.index', $course_id) }}
    <p style="font-size: 14px;">Вы тут: {{ $lesson->course->title }} / {{ $lesson->title }}</p>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Список тестов</h3>

            <div class="card-tools">
                <a href="{{ route('test.create', ['course_id' => $course_id, 'lesson_id' => $lesson_id]) }}" class="btn btn-default"><i class="fa fa-edit"></i>&nbsp;Добавить тест</a>
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
                    <th style="width: 20%">
                        Связь
                    </th>
                    <th style="width: 20%">
                        Тип
                    </th>
                    <th style="width: 20%">
                        Кол-во вопросов
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
                @foreach($tests as $test)
                <tr>
                    <td>
                        #{{ $test->id }}
                    </td>
                    <td>
                        <a>
                            {{ $test->title }}
                        </a>
                        <br>
                        <small>
                            Дата: {{ $test->created_at->format('d.m.Y') }}
                        </small>
                    </td>
                    <td>
                        <p><i>{{ $test->lesson->course->title }}</i></p>
                        <p><i>{{ $test->lesson->title }}</i></p>
                    </td>
                    <td>
                        @if($test->type == 1)
                            Закрытый
                        @else
                            Открытый
                        @endif
                    </td>
                    <td>
                        {{ count($test->questions) }}
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-info btn-sm" href="{{ route('test.edit', ['course_id' => $course_id, 'lesson_id' => $lesson_id,'test_id' => $test->id]) }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Ред.
                        </a>
                        <a class="btn btn-warning btn-sm" href="{{ route('questions.index', ['course_id' => $course_id, 'lesson_id' => $lesson_id,'test' => $test->id]) }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Вопросы ({{ count($test->questions) }})
                        </a>
                        <button onclick="confirm('Вы хотите удалить?') ? window.location = $(this).attr('data-url') : $(this).preventDefault();" data-url="{{ route('test.destroy', ['course_id' => $course_id, 'lesson_id' => $lesson_id, 'test_id' => $test->id]) }}" class="btn btn-danger btn-sm">
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
