<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Nanny extends Model
{

    protected $appends = [''];
    protected $fillable = [
        'main_image',
        'name',
        'first_name',
        'last_name',
        'mobile',
        'country',
        'city',
        'age',
        'religion',
        'children',
        'job',
        'salary',
        'experience',
        'marital_status',
        'education',
        'height',
        'weight',
        'arabic_lang',
        'english_lang',
        'about',
        'skills',
        'gallery',
    ];

}
