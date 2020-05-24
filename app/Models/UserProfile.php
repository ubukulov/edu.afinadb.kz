<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_profiles';

    protected $fillable = [
        'user_id', 'firstname', 'lastname', 'patronymic', 'phone', 'address', 'image', 'created_at', 'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
