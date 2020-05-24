<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
        'lesson_id', 'title', 'type',  'created_at', 'updated_at'
    ];

    public function lesson()
    {
        return $this->belongsTo('App\Models\Lesson');
    }

    public function questions()
    {
        return $this->hasMany('App\Models\Question', 'test_id');
    }

    public function questions_answers()
    {
        return $this->hasMany('App\Models\Question', 'test_id')->with('answers');
    }

    public function result()
    {
        return $this->hasMany('App\Models\UserTest', 'test_id')->latest();
    }

    public function results()
    {
        return $this->hasMany('App\Models\UserTest', 'test_id')->orderBy('id', 'DESC');
    }
}
