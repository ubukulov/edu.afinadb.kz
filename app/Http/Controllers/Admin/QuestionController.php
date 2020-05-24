<?php

namespace App\Http\Controllers\Admin;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Test;
use App\Models\TestResult;
use App\Models\UserTest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param int $test_id
     * @return \Illuminate\Http\Response
     */
    public function index($course_id, $lesson_id, $test_id)
    {
        $test = Test::findOrFail($test_id);
        return view('admin.question.index', compact('test', 'course_id', 'lesson_id'));
    }

    /**
     * Show the form for creating a new resource.
     * @param int $test_id
     * @return \Illuminate\Http\Response
     */
    public function create($course_id, $lesson_id, $test_id)
    {
        $test = Test::findOrFail($test_id);
        return view('admin.question.create', compact('test', 'course_id', 'lesson_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $test_id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $course_id, $lesson_id, $test_id)
    {
        $title = $request->input('title');
        $count_answer = $request->input('count_answer');
        $test = Test::find($test_id);

        DB::beginTransaction();
        try {
            if ($test->type == 1) {
                // закрытый тест
                $answers = $request->input('answers');
                $question = Question::create([
                    'test_id' => $test_id, 'title' => $title, 'count_answer' => $count_answer
                ]);

                foreach(json_decode($answers) as $answer) {
                    Answer::create([
                        'user_id' => Auth::id(),'question_id' => $question->id, 'title' => $answer->title, 'check' => "$answer->check"
                    ]);
                }
            }else {
                // открытый тест
                Question::create([
                    'test_id' => $test_id, 'title' => $title, 'count_answer' => $count_answer
                ]);
            }

            DB::commit();
            return response('Вопрос с ответами успешно создан');
        } catch (\Exception $exception) {
            DB::rollBack();
            return response("При создание произошло ошибка $exception", 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $test_id
     * @param  int  $question_id
     * @return \Illuminate\Http\Response
     */
    public function edit($course_id, $lesson_id, $test_id, $question_id)
    {
        $question = Question::findOrFail($question_id);
        $answers = $question->answers;
        $test = Test::findOrFail($test_id);
        return view('admin.question.edit', compact('question', 'test', 'answers', 'course_id', 'lesson_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $test_id
     * @param  int  $question_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $course_id, $lesson_id, $test_id, $question_id)
    {
        $title = $request->input('title');
        $count_answer = $request->input('count_answer');
        $test = Test::find($test_id);

        DB::beginTransaction();
        try {
            $question = Question::find($question_id);
            $question->title = $title;
            $question->save();

            if ($test->type == 1) {
                // закрытый тест
                $answers = $request->input('answers');

                foreach(json_decode($answers) as $item) {
                    $answer = Answer::find($item->id);
                    $answer->update([
                        'title' => $item->title, 'check' => $item->check
                    ]);
                }
            }

            DB::commit();
            return response('Вопрос с ответами успешно обновлен');
        } catch (\Exception $exception) {
            DB::rollBack();
            return response("При создание произошло ошибка $exception", 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($course_id, $lesson_id, $test_id, $id)
    {
        Question::destroy($id);
        return redirect()->route('questions.index', ['course_id' => $course_id, 'lesson_id' => $lesson_id, 'test_id' => $test_id]);
    }

    public function answers($course_id, $lesson_id, $test_id, $question_id)
    {
        $test = Test::find($test_id);
        $question = Question::find($question_id);
        return view('admin.question.answers', compact('test', 'question', 'course_id', 'lesson_id'));
    }

    public function answers_check(Request $request)
    {
        $answer_id = $request->input('answer_id');
        $test_id = $request->input('test_id');
        $question_id = $request->input('question_id');
        $comment = $request->input('comment');
        $check = $request->input('check');

        $answer = Answer::find($answer_id);
        $answer->check = $check;
        $answer->comment = $comment;
        $answer->save();

        $test_result = TestResult::where(['question_id' => $question_id, 'answer_id' => $answer_id])->first();
        $user_test = UserTest::find($test_result->user_test_id);
        if ($check == '1') {
            if ($user_test->count_questions > $user_test->count_correct_answers) {
                $user_test->count_correct_answers += 1;
            }
        } else {
            if ($user_test->count_correct_answers != 0) {
                $user_test->count_correct_answers -= 1;
            }
        }
        $user_test->save();

        return response('Ответ сделан правильным.');
    }
}
