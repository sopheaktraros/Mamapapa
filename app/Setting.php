<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $primaryKey = 'setting_name';
    public $incrementing = false;

}
