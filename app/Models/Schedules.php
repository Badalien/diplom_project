<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedules extends Model
{
    protected $fillable = array('user_id', 'day_week', 'lesson_number', 'subject_id', 'subject');
}
