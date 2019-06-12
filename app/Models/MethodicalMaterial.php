<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MethodicalMaterial extends Model
{
    protected $fillable = array('file_path', 'name', 'description', 'user_id');
}
