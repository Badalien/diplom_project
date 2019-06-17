<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Folders extends Model
{
    protected $fillable = array('name', 'group_id', 'parent_id');
}
