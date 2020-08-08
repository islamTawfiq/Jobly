<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Nanny extends Model
{

    protected $appends = ['broker_name','about_nanny','country_name','job_name'];
    protected $fillable = [
        'main_image',
        'name',
        'first_name',
        'last_name',
        'country_id',
        'city',
        'age',
        'religion',
        'children',
        'job_id',
        'salary',
        'fees',
        'experience',
        'country_ex',
        'marital_status',
        'education',
        'height',
        'weight',
        'arabic_lang',
        'english_lang',
        'about',
        'passport',
        'medical',
        'skills',
        'gallery',
        'date',
        'time',
        'status',
        'reserve_id',
        'broker_id',
    ];


    public function broker()
    {
        return $this->belongsTo('App\Model\User', 'broker_id');
    }
    public function reserve()
    {
        return $this->belongsTo('App\Model\User', 'reserve_id');
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

    public function county()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }

    public function getCountryNameAttribute()
    {

        $attribute = '';
        if ($this->county) {
            $attribute = $this->county->name;
        }
        return $attribute;
    }
    public function job()
    {
        return $this->hasOne(Job::class, 'id', 'job_id');
    }

    public function getJobNameAttribute()
    {

        $attribute = '';
        if ($this->job) {
            $attribute = $this->job->title;
        }
        return $attribute;
    }







}
