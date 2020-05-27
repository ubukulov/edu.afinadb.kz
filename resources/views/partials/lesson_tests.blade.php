@if(isset($test->questions))
    <div id="lesson_test" class="tests-for-lesson mt-4">
        <h4>{{ $test->title }}</h4>

        @if($test->type == 1)

            <div v-for="(question, index) in questions" class="question mb-4">
                <div class="question-title">
                    @{{ index+1 }}) @{{ question.title }}
                </div>

                <div class="answer">
                    <div class="custom-control custom-radio" v-for="(answer, i) in question.answers">
                        <input type="radio" class="custom-control-input" :id="answer.id" :name="index" v-model="questions_answers[question.id]" :value="answer.id">
                        <label class="custom-control-label" :for="answer.id">@{{ answer.title }}</label>
                    </div>
                </div>

            </div>

            <p v-if="errors.length" style="margin-bottom: 0px !important;">
                <ul style="color: red; padding-left: 15px; list-style: circle; text-align: left;">
                    <li v-for="error in errors">@{{ error }}</li>
                </ul>
            </p>

            <div class="form-group">
                <button type="button" @click="sendMyTest()" class="btn btn-success">Завершить тест и отправить на проверку...</button>
            </div>
        @else
            <div v-for="(question, index) in questions_without_answers" class="question mb-4">
                @{{ index + 1 }}) @{{ question.title }}

                <div class="answer" style="padding-left: 25px;">
                    <textarea v-model="questions_answers[question.id]" class="form-control" cols="30" rows="3"></textarea>
                </div>
            </div>

            <p v-if="errors.length" style="margin-bottom: 0px !important;">
                <ul style="color: red; padding-left: 15px; list-style: circle; text-align: left;">
                    <li v-for="error in errors">@{{ error }}</li>
                </ul>
            </p>

            <div class="form-group">
                <button type="button" @click="sendMyTest()" class="btn btn-success">Завершить тест и отправить на проверку...</button>
            </div>
        @endif


        @include('partials.test_1', ['test' => $test])

        @include('partials.test_2', ['test' => $test])

        <!-- Modal -->
        <div class="modal fade" id="testModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="modal-title" id="exampleModalLabel">Тест завершен</h5>
                                </div>

                                <div class="col-md-6">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span style="font-size: 30px" aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="user-test-info">
                            <p v-if="test_result.next_lesson == ''">
                                Поздравляем! <br>
                                Вы успешно закончили обучение курса.
                            </p>
                            <p><strong>Имя: </strong>{{ Auth::user()->profile->firstname }}</p>
                            <p><strong>Дата выполнение: </strong>@{{ test_result.date }}</p>
                            <p><strong>Правильных ответов:</strong>&nbsp;@{{ test_result.percent }}% (@{{ test_result.cca }} из @{{ test_result.cq }})</p>
                            <p v-html="test_result.res"></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a :href="test_result.list_lesson_link" class="btn btn-primary">Перейти к списку уроков</a>
                        <button @click="windowRefresh()" type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        <a v-if="test_result.percent == 100 && test_result.next_lesson != ''" :href="test_result.next_lesson" class="btn btn-primary">Перейти к след. уроку</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>
    <script>
        var lesson_test = new Vue({
            el: '#lesson_test',
            data: {
                questions: {!! json_encode($test->questions_answers) !!},
                questions_without_answers: {!! json_encode($test->questions) !!},
                questions_answers: {},
                test_id: {!! $test->id !!},
                lesson_id: {!! $lesson->id !!},
                test_result: [],
                errors: []
            },
            methods: {
                sendMyTest(){
                    this.errors = [];

                    if (this.questions.length != Object.keys(this.questions_answers).length) {
                        this.errors.push('Пожалуйста ответьте на все вопросы');
                    }

                    if (this.errors.length == 0) {
                        let form_data = new FormData();
                        form_data.append('questions_answers', JSON.stringify(this.questions_answers));
                        form_data.append('test_id', this.test_id);
                        let url = window.location + '/testing'
                        axios.post(url, form_data)
                        .then(res => {
                            console.log(res)
                            this.getTestResult(this.test_id, this.lesson_id)
                            $('#testModal').removeClass('fade').modal('toggle');
                        })
                        .catch(err => {
                            console.log(err)
                        })
                    }
                },
                getTestResult(test_id, lesson_id){
                    axios.get('/api/test/'+test_id+'/lesson/'+lesson_id+'/result')
                    .then(res => {
                        this.test_result = res.data
                    })
                    .catch(err => {
                        console.log(err)
                    })
                },
                windowRefresh(){
                    let current_url = window.location;
                    window.location = current_url;
                }
            },
            created(){
                //console.log(this.questions)
            }
        });
    </script>
    <style>
        .user-test-info p {
            margin-bottom: 0px !important;
        }
    </style>
@endif
