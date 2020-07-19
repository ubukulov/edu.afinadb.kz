<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'course_id', 'title', 'full_description', 'created_at', 'updated_at', 'video', 'position'
    ];

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    public function tests()
    {
        return $this->hasMany('App\Models\Test', 'lesson_id')->latest();
    }

    public function count_tests()
    {
        $tests = Test::where(['lesson_id' => $this->id])->get();
        return count($tests);
    }

    public static function remove($id)
    {
        Lesson::destroy($id);
    }

    public function url()
    {
        return route('web.lesson.index', ['course_id' => $this->course_id, 'lesson_id' => $this->id]);
    }

    public function course_list_lesson()
    {
        return route('web.course.index', ['id' => $this->course_id]);
    }

    public function is_previous_success($previous_lesson)
    {
        if($previous_lesson && count($previous_lesson->tests) > 0){
            $test = $previous_lesson->tests[0];
            if (isset($test)) {
                $user_test = $test->result;
                if (count($user_test) > 0) {
                    if ($user_test[0]->count_questions == $user_test[0]->count_correct_answers) {
                        return true;
                    }
                }
            }
        }

        return false;
    }
}
