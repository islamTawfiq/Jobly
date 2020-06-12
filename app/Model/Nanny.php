<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Nanny extends Model
{


    protected $appends = ['broker_name','about_nanny'];
    protected $fillable = [
        'main_image',
        'name',
        'first_name',
        'last_name',
        'mobile',
        'country',
        'city',
        'age',
        'religion',
        'children',
        'job',
        'salary',
        'experience',
        'marital_status',
        'education',
        'height',
        'weight',
        'arabic_lang',
        'english_lang',
        'about',
        'skills',
        'gallery',
        'date',
        'time',
        'status',
        'agency_id',
        'broker_id',
    ];


    public function broker()
    {
        return $this->belongsTo('App\Model\User', 'broker_id');
    }
    public function agency()
    {
        return $this->belongsTo('App\Model\User', 'agency_id');
    }


    public function getBrokerNameAttribute(){
        $attribute='';
        if ($this->broker()){
            $attribute = $this->broker->name;
        }
        return $attribute;
    }

    public function getAboutNannyAttribute(){
        $attribute = Str::words($this->about, 14, '...');
        return $attribute;
    }







}
