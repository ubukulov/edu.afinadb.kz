<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = 'users_roles';

    protected $fillable = [
        'user_id', 'role', 'created_at', 'updated_at'
    ];


}
