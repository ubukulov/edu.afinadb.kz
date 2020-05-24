<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lesson;
use App\Models\Test;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($course_id, $lesson_id)
    {
        $tests = Test::where(['lesson_id' => $lesson_id])->get();
        return view('admin.test.index', compact('tests', 'course_id', 'lesson_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($course_id, $lesson_id)
    {
        return view('admin.test.create', compact('course_id', 'lesson_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $course_id, $lesson_id)
    {
        Test::create($request->all());
        return redirect()->route('test.index', ['course_id' => $course_id, 'lesson_id' => $lesson_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($course_id, $lesson_id, $test_id)
    {
        $test = Test::findOrFail($test_id);
        return view('admin.test.edit', compact('test', 'course_id', 'lesson_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $course_id, $lesson_id, $id)
    {
        $test = Test::findOrFail($id);
        $test->update($request->all());
        return redirect()->route('test.index', ['course_id' => $course_id, 'lesson_id' => $lesson_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($course_id, $lesson_id,$id)
    {
        Test::destroy($id);
        return redirect()->route('test.index', ['course_id' => $course_id, 'lesson_id' => $lesson_id]);
    }
}
