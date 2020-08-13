<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'import_id',
        'nanny_id',
        'date',
        'time',
        'notes',
        'status',
    ];

    public function import()
    {
        return $this->hasOne(User::class, 'id', 'import_id');
    }
    public function workers()
    {
        return $this->hasOne(Nanny::class, 'id', 'nanny_id');
    }

}
