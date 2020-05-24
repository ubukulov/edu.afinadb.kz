@extends('admin.dashboard')
@section('content')
    {{ Breadcrumbs::render('admin.course.users') }}
    <div class="card card-solid">
        <div class="card-body pb-0">
            <div class="row d-flex align-items-stretch">
                @foreach($users as $user)
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                        <div class="card bg-light">
                            <div class="card-header text-muted border-bottom-0">
                                Digital Strategist
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead"><b>{{ $user->profile->firstname }}</b></h2>
                                        <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope-square"></i></span> Email: {{ $user->email }}</li>
                                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Адрес: {{ $user->profile->address }}</li>
                                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Телефон: {{ $user->profile->phone }}</li>
                                        </ul>
                                    </div>
                                    <div class="col-5 text-center">
                                        <img src="/admin_lte/dist/img/user1-128x128.jpg" alt="" class="img-circle img-fluid">
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
