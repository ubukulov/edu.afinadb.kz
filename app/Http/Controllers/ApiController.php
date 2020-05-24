<?php

namespace App\Http\Controllers;

use App\Http\Resources\AnswerResource;
use App\Models\Lesson;
use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function question_answers($id)
    {
        $question = Question::findOrFail($id);
        AnswerResource::withoutWrapping();
        return AnswerResource::collection($question->answers);
    }

    public function test_result($id, $lesson_id)
    {
        $test = Test::findOrFail($id);
        $user_test = $test->result;
        $cca = $user_test[0]->count_correct_answers;
        $cq = $user_test[0]->count_questions;
        $percent = ceil(($cca * 100) / $cq);
        $res = ($percent == 100) ? '<strong>Итог:</strong>&nbsp;<span style="color: green;font-weight:bold;">ТЕСТ ПРИНЯТ!</span>' : '<strong>Итог:</strong>&nbsp;<span style="color: red;font-weight:bold;">ТЕСТ НЕ ПРИНЯТ!</span>';

        $next_lesson = Lesson::where('id', '>', $lesson_id)->orderBy('id','asc')->first();

        $arr = [
            'cca' => $cca,
            'cq' => $cq,
            'percent' => $percent,
            'res' => $res,
            'date' => $user_test[0]->created_at->format('d.m.Y H:i:s'),
            'next_lesson' => $next_lesson->url(),
            'list_lesson_link' => $next_lesson->course_list_lesson()
        ];
        return json_encode($arr);
    }
}
