@extends('layouts.app')
@section('content')
    {{ Breadcrumbs::render('lesson.view', $lesson->course, $lesson) }}
    <div class="row">
        <div class="col-md-12">
            <h2>{{ $lesson->title }}</h2>

            <hr>

            @if(!is_null($lesson->video))
            <div class="lesson-video">
                <video preload="none" controls controlsList="nodownload">
                    <source src="{{ $lesson->video }}" type="video/mp4">
                </video>
            </div>

            @endif

            @include('partials.lesson_tests', ['test' => $test])
        </div>
    </div>
@stop
