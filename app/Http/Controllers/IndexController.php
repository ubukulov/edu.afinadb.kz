<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __construct()
    {
        $this->slider = true;
        parent::__construct();
    }

    public function welcome()
    {
        $courses = Course::all();
        return view('welcome', compact('courses'));
    }
}
