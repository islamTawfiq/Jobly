<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ImportingCountry extends Model
{
    protected $table = 'importing_countries';
    protected $fillable = [
        'code',
        'name',
        'phonecode',
    ];
}
