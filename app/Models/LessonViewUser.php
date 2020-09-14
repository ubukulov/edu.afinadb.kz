<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LessonViewUser extends Model
{
    protected $table = 'lessons_view_users';

    protected $fillable = [
        'user_id', 'lesson_id', 'created_at', 'updated_at'
    ];

    public static function add($user_id, $lesson_id)
    {
        if (!LessonViewUser::exists($user_id, $lesson_id)) {
            LessonViewUser::create([
                'user_id' => $user_id, 'lesson_id' => $lesson_id
            ]);
        }
    }

    public static function exists($user_id, $lesson_id)
    {
        $result = LessonViewUser::where(['user_id' => $user_id, 'lesson_id' => $lesson_id])->first();
        return ($result) ? true : false;
    }
}
