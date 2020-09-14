<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\LessonViewUser;
use App\Models\Test;
use App\Models\TestResult;
use App\Models\UserTest;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class LessonController extends BaseController
{
    public function index($course_id, $lesson_id)
    {
        $lesson = Lesson::findOrFail($lesson_id);
        $test = $lesson->tests->first();
        LessonViewUser::add(Auth::user()->id, $lesson_id);
        return view('lesson.index', compact('lesson', 'test'));
    }

    public function testing(Request $request, $course_id, $lesson_id)
    {
        $user_id = Auth::id();
        $data = $request->all();
        $test = Test::find($data['test_id']);
        $count_questions = count($test->questions);
        $questions_answers = $data['questions_answers'];
        $questions_answers = json_decode($questions_answers);

        DB::beginTransaction();
        try {
            if ($test->type == '1') {
                // закрытый тест
                $count_correct_answers = 0;
                foreach($questions_answers as $q=>$a) {
                    $answer = Answer::findOrFail($a);
                    if ($answer->check == 1) {
                        $count_correct_answers++;
                    }
                }
                $user_test = UserTest::create([
                    'user_id' => $user_id, 'test_id' => $data['test_id'], 'count_questions' => $count_questions, 'count_correct_answers' => $count_correct_answers
                ]);

                foreach($questions_answers as $q=>$a) {
                    $q = (int) $q;
                    TestResult::create([
                        'user_test_id' => $user_test->id, 'question_id' => $q, 'answer_id' => $a
                    ]);
                }

                DB::commit();
                return response('Тестирование завершен');
            } else {
                // открытый тест
                $user_test = UserTest::create([
                    'user_id' => $user_id, 'test_id' => $data['test_id'], 'count_questions' => $count_questions, 'count_correct_answers' => 0
                ]);

                foreach($questions_answers as $q=>$a) {
                    $answer = Answer::create([
                        'user_id' => $user_id, 'question_id' => $q, 'title' => $a
                    ]);

                    TestResult::create([
                        'user_test_id' => $user_test->id, 'question_id' => $q, 'answer_id' => $answer->id
                    ]);
                }

                DB::commit();
                return response('Тестирование завершен');
            }


        } catch (\Exception $exception) {
            DB::rollBack();
            dd("Ошибка: $exception");
        }
    }

    public function dalee($course_id, $lesson_id)
    {
        $course = Course::findOrFail($course_id);
        $currentIndex = 0;
        $next_lesson_url = '';
        foreach($course->lessons as $item) {
            if ($item->id == $lesson_id) {
                $next_lesson_url .= $course->lessons[$currentIndex+1]->url();
                break;
            }
            $currentIndex++;
        }
        return redirect()->intended($next_lesson_url);
    }
}
