<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminGroup extends Model
{
    protected $fillable = [
        'name',
        'description',

        'settings_show',
        'settings_edit',

        'agencies_show',
        'agencies_add',
        'agencies_edit',
        'agencies_delete',

        'brokers_show',
        'brokers_add',
        'brokers_edit',
        'brokers_delete',

        'sponsors_show',
        'sponsors_add',
        'sponsors_edit',
        'sponsors_delete',

        'skills_show',
        'skills_add',
        'skills_edit',
        'skills_delete',

        'nannies_show',
        'nannies_add',
        'nannies_edit',
        'nannies_delete',

        'admins_show',
        'admins_add',
        'admins_edit',
        'admins_delete',

        'admin_groups_show',
        'admin_groups_add',
        'admin_groups_edit',
        'admin_groups_delete',

        'about_show',
        'about_add',
        'about_edit',
        'about_delete',

        'contact_show',
        'contact_add',
        'contact_edit',
        'contact_delete',

        'terms_show',
        'terms_add',
        'terms_edit',
        'terms_delete',

        ];

}
