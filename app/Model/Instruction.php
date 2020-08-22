<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{
    protected $table = 'instructions';
    protected $fillable = [
        'title',
        'body',
        'status',
    ];

    
}
