<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $fillable = array('file_path', 'estimate', 'status', 'description', 'user_id');
}
