@extends('admin.dashboard')
@section('content')
    {{ Breadcrumbs::render('admin.question.index', $course_id, $lesson_id, $test) }}
    @php
        $lesson = $test->lesson;
    @endphp
    <p style="font-size: 14px;">Вы тут: {{ $lesson->course->title }} / {{ $lesson->title }}</p>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Список вопросов</h3>

            <div class="card-tools">
                <a href="{{ route('questions.create', ['course_id' => $course_id, 'lesson_id' => $lesson_id,'test_id' => $test->id]) }}" class="btn btn-default"><i class="fa fa-edit"></i>&nbsp;Добавить вопрос</a>
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
                @foreach($test->questions as $q)
                <tr>
                    <td>
                        #{{ $q->id }}
                    </td>
                    <td>
                        <a>
                            {{ $q->title }}
                        </a>
                        <br>
                        <small>
                            Дата: {{ $q->created_at->format('d.m.Y') }}
                        </small>
                    </td>
                    <td class="project-actions text-right">
                        @if($test->type == 2)
                        <a class="btn btn-primary btn-sm" href="{{ route('q.answers', ['course_id' => $course_id, 'lesson_id' => $lesson_id, 'test_id' => $test->id, 'question_id' => $q->id]) }}">
                            <i class="fas fa-list-alt">
                            </i>
                            Ответы пользователей
                        </a>
                        @endif
                        <a class="btn btn-info btn-sm" href="{{ route('questions.edit', ['course_id' => $course_id, 'lesson_id' => $lesson_id, 'test' => $test->id, 'question' => $q->id]) }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Ред.
                        </a>
                        <button onclick="confirm('Вы хотите удалить?') ? window.location = $(this).attr('data-url') : $(this).preventDefault();" class="btn btn-danger btn-sm" data-url="{{ route('questions.destroy', ['course_id' => $course_id, 'lesson_id' => $lesson_id, 'test_id' => $test->id, 'question' => $q->id]) }}">
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
