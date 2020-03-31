<?php

namespace App\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    // use Notifiable, HasApiTokens;

    protected $appends = ['admin_group_name','user_main_image'];
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'phone',
        'whatsapp',
        'email',
        'password',
        'user_image',
        'status',
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
                if (session('lang') == 'en') {
                    $attribute = $this->group->name_en;
                } elseif (session('lang') == 'ar') {
                    $attribute = $this->group->name_ar;
                }
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





}