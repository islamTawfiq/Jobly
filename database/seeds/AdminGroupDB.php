<?php

use Illuminate\Database\Seeder;
use App\Model\AdminGroup;

class AdminGroupDB extends Seeder

{

    public function run()
    {
        $adminGroup['name'] ='Super Admin';
        $adminGroup['description'] = 'Have All Privilege';

        $adminGroup['settings_show'] = '1';
        $adminGroup['settings_edit'] = '1';

        $adminGroup['agencies_show'] = '1';
        $adminGroup['agencies_add'] = '1';
        $adminGroup['agencies_edit'] =  '1';
        $adminGroup['agencies_delete'] = '1';

        $adminGroup['brokers_show'] = '1';
        $adminGroup['brokers_add'] = '1';
        $adminGroup['brokers_edit'] =  '1';
        $adminGroup['brokers_delete'] = '1';

        $adminGroup['sponsors_show'] = '1';
        $adminGroup['sponsors_add'] = '1';
        $adminGroup['sponsors_edit'] =  '1';
        $adminGroup['sponsors_delete'] = '1';

        $adminGroup['skills_show'] = '1';
        $adminGroup['skills_add'] = '1';
        $adminGroup['skills_edit'] =  '1';
        $adminGroup['skills_delete'] = '1';

        $adminGroup['nannies_show'] = '1';
        $adminGroup['nannies_add'] = '1';
        $adminGroup['nannies_edit'] =  '1';
        $adminGroup['nannies_delete'] = '1';

        $adminGroup['admins_show'] = '1';
        $adminGroup['admins_add'] = '1';
        $adminGroup['admins_edit'] =  '1';
        $adminGroup['admins_delete'] =  '1';

        $adminGroup['about_show'] =  '1';
        $adminGroup['about_add'] = '1';
        $adminGroup['about_edit'] =  '1';
        $adminGroup['about_delete'] =  '1';

        $adminGroup['contact_show'] =  '1';
        $adminGroup['contact_add'] = '1';
        $adminGroup['contact_edit'] =  '1';
        $adminGroup['contact_delete'] =  '1';

        $adminGroup['terms_show'] =  '1';
        $adminGroup['terms_add'] = '1';
        $adminGroup['terms_edit'] =  '1';
        $adminGroup['terms_delete'] =  '1';


        $adminGroup['admin_groups_show'] =  '1';
        $adminGroup['admin_groups_add'] = '1';
        $adminGroup['admin_groups_edit'] =  '1';
        $adminGroup['admin_groups_delete'] =  '1';

        $adminGroup['icons_show'] = '1';
        $adminGroup['icons_add'] = '1';
        $adminGroup['icons_edit'] =  '1';
        $adminGroup['icons_delete'] =  '1';
        AdminGroup::create($adminGroup);


    }
}


