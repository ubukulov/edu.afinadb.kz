@if(isset($test->questions))
    <div id="lesson_test" class="tests-for-lesson mt-4">
        <h4>{{ $test->title }}</h4>

        @if($test->type == 1)
            <form action="{{ route('web.lesson.testing', ['id' => $lesson->course->id, 'l_id' => $lesson->id]) }}" method="post">
                @csrf
                <input type="hidden" name="test_id" value="{{ $test->id }}">
                @foreach($test->questions as $question)
                    <div class="question mb-4">
                        {{ $loop->iteration }}) {{ $question->title }}

                        <div class="answer" style="padding-left: 25px;">
                            @foreach($question->answers as $answer)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="e" required name="question[{{ $question->id }}]" value="{{ $answer->id }}">
                                    <label class="form-check-label" id="e">
                                        {{ $answer->title }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Завершить тест и отправить на проверку...</button>
                </div>
            </form>
        @else
            <form action="{{ route('web.lesson.testing', ['id' => $lesson->course->id, 'l_id' => $lesson->id]) }}" method="post">
                @csrf
                <input type="hidden" name="test_id" value="{{ $test->id }}">
                @foreach($test->questions as $question)
                    <div class="question mb-4">
                        {{ $loop->iteration }}) {{ $question->title }}

                        <div class="answer" style="padding-left: 25px;">
                            <textarea name="question[{{ $question->id }}]" class="form-control" cols="30" rows="3"></textarea>
                        </div>
                    </div>
                @endforeach

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Завершить тест и отправить на проверку...</button>
                </div>
            </form>
        @endif


        @include('partials.test_1', ['test' => $test])


        @include('partials.test_2', ['test' => $test])

    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>
    <script>
        var lesson_test = new Vue({
            el: '#lesson_test',
            data: {

            }
        });
    </script>
@endif
