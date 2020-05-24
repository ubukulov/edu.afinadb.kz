<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestResult extends Model
{
    protected $table = 'test_results';

    protected $fillable = [
        'user_test_id', 'question_id', 'answer_id', 'created_at', 'updated_at'
    ];

    public function question()
    {
        return $this->belongsTo('App\Models\Question');
    }

    public function answer()
    {
        return $this->belongsTo('App\Models\Answer');
    }
}
