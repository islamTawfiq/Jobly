<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $table = 'about_us';
    protected $fillable = [
        'title',
        'body',
        'img1',
        'img2',
        'img3',
        'img4',
        'status',
    ];

    public function getFirstImageAttribute()
    {
        $attribute = '';
        if (!empty($this->img1)){
            $attribute =url('storage' .$this->img1) ;
        } else{
            $attribute = url("design/site/images/sider-home-1.jpg");
        }
        return $attribute;
    }
    public function getSecondImageAttribute()
    {
        $attribute = '';
        if (!empty($this->img2)){
            $attribute =url('storage' .$this->img2) ;
        } else{
            $attribute = url("design/site/images/sider-home-1.jpg");
        }
        return $attribute;
    }
    public function getThirdImageAttribute()
    {
        $attribute = '';
        if (!empty($this->img3)){
            $attribute =url('storage' .$this->img3) ;
        } else{
            $attribute = url("design/site/images/sider-home-1.jpg");
        }
        return $attribute;
    }
    public function getFourthImageAttribute()
    {
        $attribute = '';
        if (!empty($this->img4)){
            $attribute =url('storage' .$this->img4) ;
        } else{
            $attribute = url("design/site/images/sider-home-1.jpg");
        }
        return $attribute;
    }




}
