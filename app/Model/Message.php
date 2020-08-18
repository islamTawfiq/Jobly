<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'nanny_id',
        'reserveation_id',
        'message',
    ];


    public function send()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function recive(){
        return $this->belongsTo(User::class,'receiver_id');
    }
    public function workers()
    {
        return $this->hasOne(Nanny::class, 'id', 'nanny_id');
    }

}
