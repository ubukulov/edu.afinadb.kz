<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $primaryKey = 'id';

    public $fillable = [
        'user_id', 'question_id', 'title', 'comment', 'check', 'created_at', 'updated_at'
    ];

    public function question()
    {
        return $this->belongsTo('App\Models\Question');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
