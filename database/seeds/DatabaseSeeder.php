<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(AdminDB::class);
        $this->call(AdminGroupDB::class);
        $this->call(settingsDB::class);
        $this->call(ContactUsDB::class);
        $this->call(AboutUsDB::class);
    }
}
