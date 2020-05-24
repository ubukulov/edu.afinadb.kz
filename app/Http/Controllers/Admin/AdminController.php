<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends BaseController
{
    public function dashboard()
    {
        return view('admin.index');
    }

    public function course($course_id)
    {
        $users = User::all();
        return view('admin.course.users', compact('users', 'course_id'));
    }

    public function access_to_course($course_id, $user_id)
    {
        $user = User::findOrFail($user_id);
        if ($user->is_access($course_id)) {
            // Закрываем доступ
            $user->deny($course_id);
        } else {
            // Открываем доступ
            $user->access($course_id);
        }

        return redirect()->back();
    }
}
