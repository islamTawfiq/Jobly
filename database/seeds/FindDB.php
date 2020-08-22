<?php

use Illuminate\Database\Seeder;
use App\Model\Find;

class FindDB extends Seeder

{
    public function run()
    {
        $data['title'] = "Find Your Domestic Workers";
        $data['body'] = "Select your demand of demotic workers and get full access to
         the best workers! A lot of domestic employee’s agencies and
         sponsors are looking for new employers, we help them to
         directly connect with you. It is FREE to subscribe";

        Find::create($data);

    }
}


