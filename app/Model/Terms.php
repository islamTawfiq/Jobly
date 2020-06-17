<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Terms extends Model
{
    protected $table = 'terms';
    protected $fillable = [
        'title',
        'body',
    ];
    
}
