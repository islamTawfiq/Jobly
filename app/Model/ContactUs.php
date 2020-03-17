<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table = 'contact_us';
    protected $fillable = [
        'mobile',
        'text_ar',
        'text_en',
    ];

    public function getTextAttribute(){
        $attribute='';
        if (session('lang' ) == 'en'){
            $attribute=$this->text_en;
        }elseif (session('lang' ) == 'ar'){
            $attribute=$this->text_ar;
        }
        return $attribute;
    }

}
