<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Storage;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param int $course_id
     * @return \Illuminate\Http\Response
     */
    public function index($course_id)
    {
        $lessons = Lesson::where(['course_id' => $course_id])->orderBy('position')->get();
        $course = Course::findOrFail($course_id);
        return view('admin.lesson.index', compact('lessons', 'course'));
    }

    /**
     * Show the form for creating a new resource.
     * @param int $course_id
     * @return \Illuminate\Http\Response
     */
    public function create($course_id)
    {
        return view('admin.lesson.create', compact( 'course_id'));
    }

    /**
     * Store a newly created resource in storage.
     * @param int $course_id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $course_id)
    {
        $data = $request->except('video');
        $lesson = Lesson::create($data);

        if ($request->hasFile('video')) {
            /*$file = $request->file('video');
            $ext = $file->getClientOriginalExtension();
            $hash_name = md5($file->getClientOriginalName());
            $file_name = $lesson->id."_".$hash_name.'.'.$ext;

            Storage::putFileAs('/public/storage', $file, $file_name);

            $lesson->video = $file_name;
            $lesson->save();*/

            $path = $request->file('video')->store('videos', 's3');
            $lesson->video = Storage::disk('s3')->url($path);
            $lesson->save();
        }

        return redirect()->route('lessons.index', ['course_id' => $course_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $course_id
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($course_id, $id)
    {
        Lesson::remove($id);
        return redirect()->route('lessons.index', ['course_id' => $course_id]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $course_id
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($course_id, $id)
    {
        $lesson = Lesson::findOrFail($id);
        return view('admin.lesson.edit', compact('lesson', 'course_id'));
    }

    /**
     * Update the specified resource in storage.
     * @param int $course_id
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $course_id, $id)
    {
        $lesson = Lesson::findOrFail($id);
        $lesson->update($request->except('video'));

        if ($request->hasFile('video')) {
            /*$file = $request->file('video');
            $ext = $file->getClientOriginalExtension();
            $hash_name = md5($file->getClientOriginalName());
            $file_name = $lesson->id."_".$hash_name.'.'.$ext;

            Storage::putFileAs('/public/storage', $file, $file_name);

            $lesson->video = $file_name;
            $lesson->save();*/

            $path = $request->file('video')->store('videos', 's3');
            $lesson->video = Storage::disk('s3')->url($path);
            $lesson->save();
        }

        return redirect()->route('lessons.index', ['course_id' => $course_id]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $course_id
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($course_id, $id)
    {
        dd($id);
        Lesson::destroy($id);
        return redirect()->route('lessons.index', ['course_id' => $course_id]);
    }
}
