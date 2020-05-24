<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Question extends Model
{
    protected $fillable = [
        'test_id', 'title', 'count_answer', 'created_at', 'updated_at'
    ];

    public function test()
    {
        return $this->belongsTo('App\Models\Test');
    }

    public function answers()
    {
        return $this->hasMany('App\Models\Answer', 'question_id');
    }

    public function correct_answer($user_answer_id)
    {
        $correct_answer = Answer::findOrFail($user_answer_id);
        if ($correct_answer && $correct_answer->check == '1') {
            return true;
        }
        return false;
    }

    public function user_answer()
    {
        $user_test = UserTest::where(['user_id' => Auth::id(), 'test_id' => $this->test_id])->first();
        if ($user_test) {
            $test_result = TestResult::where(['user_test_id' => $user_test->id])->first();
            return Answer::findOrFail($test_result->answer_id);
        }
        abort(404);
    }
}
