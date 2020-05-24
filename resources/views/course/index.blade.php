@extends('layouts.app')
@section('content')
    {{ Breadcrumbs::render('course.view', $course) }}

    <h2>{{ $course->title }}</h2>
    <hr>

    <div class="row">
        <div class="col-md-12">
            @foreach($lessons as $lesson)
                <div class="lesson">
                    <div class="lesson-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="lesson-title">
                        @if($loop->index == 0)
                            <a href="{{ route('web.lesson.index', ['id' => $course->id, 'l_id' => $lesson->id]) }}">{{ $lesson->title }}</a>
                        @else
                            @if($lesson->is_previous_success($lessons[$loop->index - 1]))
                                <a href="{{ route('web.lesson.index', ['id' => $course->id, 'l_id' => $lesson->id]) }}">{{ $lesson->title }}</a>
                            @else
                                {{ $lesson->title }}
                            @endif
                        @endif
                    </div>
                    <div class="clear"></div>
                </div>

            @endforeach
        </div>
    </div>
@stop
