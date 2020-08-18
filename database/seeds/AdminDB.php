<?php

use Illuminate\Database\Seeder;
use App\Model\User;

class AdminDB extends Seeder

{

    public function run()
    {
        $admin['name'] = "Admin";
        $admin['email'] = "jobly@admin.com";
        $admin['password'] = bcrypt(123456);
        $admin['user_type_id'] = 1;
        $admin['admin_group'] = 1;
        $admin['status'] = 1;
        $admin['active'] = 1;
        User::create($admin);

        // Broker **************************
        $admin['first_name'] = "broker";
        $admin['last_name'] = "admin";
        $admin['name'] = "Broker";
        $admin['email'] = "broker@admin.com";
        $admin['mobileNumber'] = "01068193392";
        $admin['password'] = bcrypt(123456);
        $admin['user_type_id'] = 2;
        $admin['status'] = 1;
        $admin['active'] = 1;
        User::create($admin);

        $admin['first_name'] = "broker";
        $admin['last_name'] = "admin";
        $admin['name'] = "Broker2";
        $admin['email'] = "broker2@admin.com";
        $admin['mobileNumber'] = "01068193393";
        $admin['password'] = bcrypt(123456);
        $admin['user_type_id'] = 2;
        $admin['status'] = 1;
        $admin['active'] = 1;
        User::create($admin);

        //Agency*****************************
        $admin['first_name'] = "agency";
        $admin['last_name'] = "admin";
        $admin['name'] = "Agency";
        $admin['email'] = "Agency@admin.com";
        $admin['mobileNumber'] = "01068193395";
        $admin['password'] = bcrypt(123456);
        $admin['user_type_id'] = 3;
        $admin['status'] = 1;
        $admin['active'] = 1;
        User::create($admin);

        // Sponsor ****************************
        $admin['first_name'] = "sponsor";
        $admin['last_name'] = "admin";
        $admin['name'] = "sponsor";
        $admin['email'] = "sponsor@admin.com";
        $admin['mobileNumber'] = "01068193390";
        $admin['password'] = bcrypt(123456);
        $admin['user_type_id'] = 4;
        $admin['status'] = 1;
        $admin['active'] = 1;
        
        User::create($admin);
        $admin['first_name'] = "sponsor";
        $admin['last_name'] = "admin";
        $admin['name'] = "sponsor2";
        $admin['email'] = "sponsor2@admin.com";
        $admin['mobileNumber'] = "01068193391";
        $admin['password'] = bcrypt(123456);
        $admin['user_type_id'] = 4;
        $admin['status'] = 1;
        $admin['active'] = 1;
        User::create($admin);



//        for ($x = 0; $x <= 10000; $x++) {
//            $admin['name'] = "Admin";
//            $admin['email'] = "admin@admin".$x."com";
//            $admin['password'] = bcrypt(123456);
//            $admin['user_type_id'] = 0;
//            User::create($admin);
//        }
    }
}


