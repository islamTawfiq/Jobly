<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    public $timestamps = false;

    protected $appends = ['skill'];

    protected $fillable = [
        'skill_en',
        'skill_ar'
    ];

    public function getSkillAttribute(){
        $attribute='';
        if (session('lang' ) == 'en'){
            $attribute=$this->skill_en;
        }elseif (session('lang' ) == 'ar'){
            $attribute=$this->skill_ar;
        }
        return $attribute;
    }

}
