<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends BaseController
{
    public function index($id)
    {
        $course = Course::findOrFail($id);
        $lessons = $course->lessons;
        return view('course.index', compact('course', 'lessons'));
    }
}
