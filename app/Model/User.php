<?php

namespace App\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $appends = ['admin_group_name','user_main_image','country_name'];
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'agency_name',
        'manager_name',
        'country_id',
        'address',
        'phonecode',
        'mobileNumber',
        'phone',
        'whatsapp',
        'telephone',
        'email',
        'password',
        'user_image',
        'status',
        'code',
        'active',
        'admin_group',
        'user_type_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function group_id()
    {
        return $this->hasOne(AdminGroup::class, 'id', 'admin_group');
    }

    public function group()
    {
        return $this->hasOne(AdminGroup::class, 'id', 'admin_group');
    }

    public function getAdminGroupNameAttribute()
    {
        $attribute = '';
        if ($this->admin_group) {
            if ($this->group()) {
                $attribute = $this->group->name;
            }
        }
        return $attribute;
    }

    public function getUserMainImageAttribute()
    {
        $attribute = '';
        if ($this->user_image != null || !empty($this->user_image)) {
            $attribute = url('storage') . $this->user_image;
        } else {
            $attribute = Settings::first()->main_logo;
        }
        return $attribute;
    }


    public function nannies()
    {
        return $this->hasMany('App\Model\Nanny', 'broker_id');
    }

    // public function nanny_reserve()
    // {
    //     return $this->hasMany('App\Model\Nanny', 'reserve_id');
    // }

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

    // public function likes()
    // {
    //     return $this->hasMany(Like::class, 'user_id');
    // }

}
