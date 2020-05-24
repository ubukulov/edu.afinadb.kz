@extends('admin.dashboard')
@section('content')
    {{ Breadcrumbs::render('admin.question.answers', $course_id, $lesson_id, $test) }}
    <div class="card" id="question_answers">
        <div class="card-header">
            <h3 class="card-title">{{ $question->title }} - список ответов</h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                <tr>
                    <th style="width: 1%">
                        #
                    </th>
                    <th style="width: 10%">
                        Пользователь
                    </th>
                    <th style="width: 20%">
                        Ответы
                    </th>
                    <th style="width: 20%">
                        Комменты
                    </th>
                    <th style="width: 1%">
                        Статус
                    </th>
                    <th style="width: 15%">
                        Действие
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($question->answers as $answer)
                    <tr>
                        <td>
                            #{{ $answer->id }}
                        </td>
                        <td>
                            <a>
                                <img alt="Avatar" class="table-avatar" src="/admin_lte/dist/img/avatar.png">
                                {{ $answer->user->profile->firstname }}
                            </a>
                            <br>
                            <small>
                                Дата: {{ $answer->created_at->format('d.m.Y') }}
                            </small>
                        </td>
                        <td>
                            {{ $answer->title }}
                        </td>
                        <td>
                            <textarea id="comment{{ $answer->id }}" cols="30" rows="3" class="form-control">{!! $answer->comment !!}</textarea>
                        </td>
                        <td>
                            @if($answer->check == 1)
                                <span style="color: green;"><i style="font-size: 30px;" class="fa fa-check-circle"></i></span>
                            @else
                                <span style="color: red;"><i style="font-size: 30px;" class="fa fa-minus-circle"></i></span>
                            @endif
                        </td>
                        <td class="project-actions text-right">
                            <button @click="answerRight({{ $answer->id }})" class="btn btn-success btn-sm">
                                <i class="fas fa-check-circle"></i>&nbsp;Правильно
                            </button>

                            <button @click="answerWrong({{ $answer->id }})" class="btn btn-danger btn-sm">
                                <i class="fas fa-minus-circle">
                                </i>
                                Не правильно
                            </button>
                            {{--<a class="btn btn-danger btn-sm" href="{{ route('questions.destroy', ['id' => $test->id, 'question' => $question->id]) }}">
                                <i class="fas fa-trash">
                                </i>
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

    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>
    <script>
        var question_answers = new Vue({
            el: '#question_answers',
            methods: {
                answerRight(answer_id){
                    if(confirm('Вы хотите сделать ответ правильными?')) {
                        let comment = $("#comment"+answer_id).val();
                        let test_id = {!! $test->id !!};
                        let question_id = {!! $question->id !!};
                        let current_url = window.location;
                        let form_data = new FormData();
                        form_data.append('check', '1');
                        form_data.append('answer_id', answer_id);
                        form_data.append('question_id', question_id);
                        form_data.append('test_id', test_id);
                        form_data.append('comment', comment);
                        axios.post('/admin/question/'+answer_id+'/right', form_data)
                        .then(res => {
                            console.log(res)
                            window.location = current_url;
                        })
                        .catch(err => {
                            console.log(err)
                        })
                    }
                },
                answerWrong(answer_id){
                    if(confirm('Вы хотите сделать ответ не правильными?')) {
                        let comment = $("#comment"+answer_id).val();
                        let test_id = {!! $test->id !!};
                        let question_id = {!! $question->id !!};
                        let current_url = window.location;
                        let form_data = new FormData();
                        form_data.append('check', '0');
                        form_data.append('answer_id', answer_id);
                        form_data.append('question_id', question_id);
                        form_data.append('test_id', test_id);
                        form_data.append('comment', comment);
                        axios.post('/admin/question/'+answer_id+'/right', form_data)
                            .then(res => {
                                console.log(res)
                                window.location = current_url;
                            })
                            .catch(err => {
                                console.log(err)
                            })
                    }
                }
            }
        })
    </script>
@stop
