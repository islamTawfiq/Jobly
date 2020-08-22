<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = [
        'home',
        'domestic_workers',
        'local_domestic_workers',
        'about',
        'contact',
        'sourcing_broker',
        'sourcing_agency',
        'recruitment_agency',
        'sponsorship',
    ];

}
