@extends('admin.dashboard')
@section('content')
    {{ Breadcrumbs::render('admin.course.users') }}
    <div class="card card-solid">
        <div class="card-body pb-0">
            <div class="row d-flex align-items-stretch">
                @foreach($users as $user)
                    <div class="col-md-3 d-flex align-items-stretch">
                        <div class="card bg-light">
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-12">
                                        <h2 class="lead"><b>{{ $user->profile->firstname }}</b></h2>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope-square"></i></span> Email: {{ $user->email }}</li>
                                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Телефон: {{ $user->profile->phone }}</li>
                                            @if($lesson = $user->current_lesson())
                                                <li class="small"><strong>Сейчас изучает</strong></li>
                                                <li class="small">Курс: <i>{{ $lesson->course->title }}</i></li>
                                                <li class="small">Урок: <i>{{ $lesson->title }}</i></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    @if($user->is_access($course_id))
                                        <a href="{{ route('access.course', ['course_id' => $course_id, 'user_id' => $user->id]) }}" class="btn btn-sm btn-dark">
                                            <i class="fa fa-unlock"></i>&nbsp; Закрыть доступ
                                        </a>
                                    @else
                                        <a href="{{ route('access.course', ['course_id' => $course_id, 'user_id' => $user->id]) }}" class="btn btn-sm btn-info">
                                            <i class="fa fa-unlock-alt"></i>&nbsp; Открыть доступ
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- /.card-body -->
        {{--<div class="card-footer">
            <nav aria-label="Contacts Page Navigation">
                <ul class="pagination justify-content-center m-0">
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                    <li class="page-item"><a class="page-link" href="#">7</a></li>
                    <li class="page-item"><a class="page-link" href="#">8</a></li>
                </ul>
            </nav>
        </div>
        <!-- /.card-footer -->--}}
    </div>
@stop
