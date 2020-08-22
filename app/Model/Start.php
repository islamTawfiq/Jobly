<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Start extends Model
{
    protected $table = 'starts';
    protected $fillable = [
        'family',
        'family_instruction1',
        'family_instruction2',
        'family_instruction3',
        'sourcing',
        'sourcing_instruction1',
        'sourcing_instruction2',
        'sourcing_instruction3',
        'agent',
        'agent_instruction1',
        'agent_instruction2',
        'agent_instruction3',
    ];

}
