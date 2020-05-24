<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTest extends Model
{
    protected $table = 'user_tests';

    protected $fillable = [
        'user_id', 'test_id', 'count_questions', 'count_correct_answers', 'created_at', 'updated_at'
    ];

    public function test_results()
    {
        return $this->hasMany('App\Models\TestResult', 'user_test_id');
    }
}
