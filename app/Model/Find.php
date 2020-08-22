<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Find extends Model
{
    protected $table = 'find';
    protected $fillable = [
        'title',
        'body',
    ];

}
