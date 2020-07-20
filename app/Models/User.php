<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne('App\Models\UserProfile', 'user_id');
    }

    public function roles()
    {
        return $this->hasMany('App\Models\UserRole', 'user_id');
    }

    public function is_access($course_id)
    {
        $record = UserCourse::where(['user_id' => $this->id, 'course_id' => $course_id])->first();
        return ($record) ? true : false;
    }

    public function access($course_id)
    {
        UserCourse::create(['user_id' => $this->id, 'course_id' => $course_id]);
    }

    public function deny($course_id)
    {
        $record = UserCourse::where(['user_id' => $this->id, 'course_id' => $course_id])->first();
        if ($record) {
            UserCourse::destroy($record->id);
        }
    }

    public function addRole($role = 'user')
    {
        UserRole::create(['user_id' => $this->id, 'role' => $role]);
    }

    public function current_lesson()
    {
        $user_test = UserTest::where(['user_id' => $this->id])->orderBy('id', 'DESC')->first();
        if ($user_test && !empty($user_test)) {
            $test = Test::findOrFail($user_test->test_id);
            return $test->lesson;
        }
        return false;
    }
}
