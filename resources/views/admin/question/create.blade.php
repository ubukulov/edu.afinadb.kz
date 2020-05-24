@extends('admin.dashboard')
@section('content')
    {{ Breadcrumbs::render('admin.question.create', $course_id, $lesson_id, $test) }}
    <input type="hidden" id="test_id" value="{{ $test->id }}">
    <section class="content">
        <div id="question">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Вопрос</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Наименование вопроса</label>
                                <textarea v-model="title" class="form-control" cols="30" rows="3"></textarea>
                            </div>
                            @if($test->type == 1)
                            <div class="form-group">
                                <label for="type">Кол-во ответов</label>
                                <input type="text" class="form-control" v-model="count_answer">
                            </div>
                            @endif

                            <div class="form-group">
                                <button type="button" @if($test->type == 1) @click="createQuestionForTest()" @else @click="createQuestionForTest2()" @endif class="btn btn-default"><i class="fa fa-save"></i>&nbsp;Создать</button>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                @if($test->type != 2)
                <div class="col-md-6">
                    <div class="card card-warning" v-for="(item, index) in items">
                        <div class="card-header">
                            <h3 class="card-title">@{{ index + 1 }}) Ответ</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Наименование ответа</label>
                                <input type="text" class="form-control" v-model="item.title">
                            </div>
                            <div class="form-group">
                                <label for="type">Правильно</label>
                                <select id="type" v-model="item.check" class="form-control">
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                @endif
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>
    <script>
        var app = new Vue({
            el: '#question',
            data: {
                title: '',
                count_answer: 1,
                items: [
                    {
                        title: '',
                        check: 0
                    }
                ]
            },
            methods: {
                createQuestionForTest(){
                    console.log(this.items)
                    let form_data = new FormData();
                    form_data.append('title', this.title);
                    form_data.append('count_answer', this.count_answer);
                    form_data.append('answers', JSON.stringify(this.items));
                    let test_id = $('#test_id').val();
                    let course_id = {!! $course_id !!};
                    let lesson_id = {!! $lesson_id !!};

                    axios.post('/admin/courses/'+course_id+'/lessons/'+lesson_id+'/tests/'+test_id+'/questions', form_data)
                        .then(res => {
                            console.log(res)
                            window.location = '/admin/courses/'+course_id+'/lessons/'+lesson_id+'/tests/' + test_id + '/questions';
                        })
                        .catch(err => {
                            console.log(err)
                        })
                },
                createQuestionForTest2(){
                    let form_data = new FormData();
                    form_data.append('title', this.title);
                    form_data.append('count_answer', this.count_answer);
                    let test_id = $('#test_id').val();
                    let course_id = {!! $course_id !!};
                    let lesson_id = {!! $lesson_id !!};

                    axios.post('/admin/courses/'+course_id+'/lessons/'+lesson_id+'/tests/'+test_id+'/questions', form_data)
                        .then(res => {
                            console.log(res)
                            window.location = '/admin/courses/'+course_id+'/lessons/'+lesson_id+'/tests/'+test_id+'/questions';
                        })
                        .catch(err => {
                            console.log(err)
                        })
                }
            },
            watch: {
                count_answer: function(){
                    //console.log(this.items)
                    this.items = []
                    for(let i = 1; i <= this.count_answer; i++) {
                        this.items.push({
                            title: '',
                            check: 0
                        });
                    }
                }
            }
        })
    </script>
@stop
