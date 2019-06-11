<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = array('subject', 'text', 'date_publish', 'active', 'user_id');
}
