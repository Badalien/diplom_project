<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    const STUDENT_ROLE = 'student';
    const ADMIN_ROLE = 'admin';
    const ROLES = [
        self::ADMIN_ROLE,
        self::STUDENT_ROLE
    ];

    protected $fillable = array('name', 'patronymic', 'second_name', 'password', 'email', 'group_id');
}
