<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteConfigs extends Model
{
    protected $fillable = array('type', 'value');
}
