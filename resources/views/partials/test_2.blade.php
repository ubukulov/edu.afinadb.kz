@if($test->type == '2' && count($test->result) > 0)

    <div class="test-history-title">
        Результаты тестирование
    </div>

    @foreach($test->results as $user_test)
        @php
            $cca = $user_test->count_correct_answers;
            $cq = $user_test->count_questions;
            $percent = ceil(($cca * 100) / $cq);
            $res = ($percent == 100) ? '<span style="color: green;font-weight:bold;">ТЕСТ ПРИНЯТ!</span>' : '<span style="color: red;font-weight:bold;">ТЕСТ НЕ ПРИНЯТ!</span>';
        @endphp

        <div class="test-result mb-4 mt-3 @if($percent == 100) test-success @else test-error @endif">
            <div class="user-test-info">
                <p><strong>Имя: </strong>{{ Auth::user()->profile->firstname }}</p>
                <p><strong>Дата выполнение: </strong>{{ $user_test->created_at->format('d.m.Y H:i:s') }}</p>
                <p><strong>Правильных ответов:</strong>&nbsp;{{ $percent }}% ({{ $cca }} из {{ $cq }})</p>
                <p><strong>Итог:</strong>&nbsp;{!! $res !!}</p>
            </div>

            <hr>

            @foreach($user_test->test_results as $test_result)
                @php
                    $question = $test_result->question;
                    $answer = $test_result->answer;
                @endphp

                <div class="test-history-block">
                    <p><strong>{{ $loop->iteration }}. {{ $question->title }}</strong></p>


                    <p><strong>Ваш ответ: </strong>{{ $answer->title }}</p>
                    <p><strong>Комменты Дмитрия: </strong>{{ $answer->comment }}</p>

                    @if($question->correct_answer($test_result->answer_id))
                        <p><span style="color: green; font-weight: bold;">Принят!</span></p>
                    @else
                        <p><span style="color: red; font-weight: bold;">Не принят!</span></p>
                    @endif
                </div>
            @endforeach
        </div>
    @endforeach


@endif
