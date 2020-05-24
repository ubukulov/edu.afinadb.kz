@extends('admin.dashboard')
@section('content')
    {{ Breadcrumbs::render('admin.course.index') }}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Список курсов</h3>
            <div class="card-tools">
                <a href="{{ route('courses.create') }}" class="btn btn-default"><i class="fa fa-edit"></i>&nbsp;Добавить курс</a>
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
                @foreach($courses as $course)
                <tr>
                    <td>
                        #{{ $course->id }}
                    </td>
                    <td>
                        <a>
                            {{ $course->title }}
                        </a>
                        <br>
                        <small>
                            Дата: {{ $course->created_at->format('d.m.Y') }}
                        </small>
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-dark btn-sm" href="{{ route('access.course.index', ['id' => $course->id]) }}">
                            <i class="fa fa-users"></i>&nbsp;
                            Пользователи
                        </a>
                        <a class="btn btn-warning btn-sm" href="{{ route('lessons.index', ['id' => $course->id]) }}">
                            <i class="fa fa-users"></i>&nbsp;
                            Уроки
                        </a>
                        <a class="btn btn-info btn-sm" href="{{ route('courses.edit', ['id' => $course->id]) }}">
                            <i class="fas fa-pencil-alt"></i>&nbsp;
                            Ред.
                        </a>
                        {{--<a class="btn btn-danger btn-sm" href="{{ route('courses.destroy', ['id' => $course->id]) }}">
                            <i class="fas fa-trash"></i>&nbsp;
                            Удалить
                        </a>--}}
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@stop
