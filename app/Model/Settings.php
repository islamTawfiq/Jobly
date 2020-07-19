<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    public $timestamps = false;
    // protected $appends = ['main_logo'];
    protected $fillable = [
        'title',
        'fullName',
        'address',
        'mail',
        'mobileNumber',
        'fax',
        'facebookUrl',
        'googleUrl',
        'linkedInUrl',
        'twitterUrl',
        'instagramUrl',
        'youtubeUrl',
        'gitHupUrl',
        'logo',
        'icon',
        'keyWords',
        'description',
    ];

    public function getMainLogoAttribute()
    {
        $attribute = '';
        if (!empty($this->logo)){
            $attribute =url('storage' .$this->logo) ;
        }else{
            $attribute = url("design/admin/img/logo.png");
        }
        return $attribute;
    }

    public function getMainIconAttribute()
    {
        $attribute = '';
        if (!empty($this->icon)){
            $attribute =url('storage' .$this->icon) ;
        }else{
            $attribute = url("design/admin/img/logo.png");
        }

        return $attribute;
    }

}
