<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title', 'full_description', 'img', 'created_at', 'updated_at'
    ];

    public function lessons()
    {
        return $this->hasMany('App\Models\Lesson', 'course_id')->orderBy('position');
    }
}
