<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';
    protected $fillable = [
        'user_id',
        'nanny_id',
        'like',
    ];

    public function nanny()
    {
        return $this->belongsTo(Nanny::class, 'nanny_id');
    }

    public function getLikeStatusAttribute(){
        $attribute='';
        if ($this->like == 1) {
            $attribute = 'favourit';
        }
        return $attribute;
    }

}
