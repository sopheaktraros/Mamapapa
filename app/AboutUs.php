<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $table = 'about_us';
    protected $fillable = [
        'who_description_en',
        'who_description_kh',
        'who_image',
        'why_description_en',
        'why_description_kh',
        'why_image',
    ];
}
