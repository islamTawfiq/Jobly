<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $table = 'about_us';
    protected $fillable = [
        'title_ar',
        'title_en',
        'body_ar',
        'body_en',
        'img1',
        'img2',
        'img3',
        'img4',
        'status',
    ];

    public function getTitleAttribute(){
        $attribute='';
        if (session('lang' ) == 'en'){
            $attribute=$this->title_en;
        }elseif (session('lang' ) == 'ar'){
            $attribute=$this->title_ar;
        }
        return $attribute;
    }

    public function getBodyAttribute(){
        $attribute='';
        if (session('lang' ) == 'en'){
            $attribute=$this->body_en;
        }elseif (session('lang' ) == 'ar'){
            $attribute=$this->body_ar;
        }
        return $attribute;
    }


   
}
