@extends('admin.dashboard')
@section('content')
    {{ Breadcrumbs::render('admin.users.index') }}
    <div style="margin: 20px 0px;">
        <a href="{{ route('users.create') }}" class="btn btn-default"><i class="fa fa-user-edit"></i>&nbsp;Добавить пользователя</a>
    </div>
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
                                @foreach($user->roles as $user_role)
                                    @if($user_role->role == 'admin')
                                        <a href="#" class="btn btn-sm btn-default">
                                            Админ
                                        </a>
                                    @else
                                        <a href="#" class="btn btn-sm btn-warning">
                                            Пользователь
                                        </a>
                                    @endif
                                @endforeach
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
