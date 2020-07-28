<?php

use App\Model\Job;
use Illuminate\Database\Seeder;

class JobsDB extends Seeder

{
    public function run()
    {
        $data['title'] = "Driver";
        Job::create($data);

        $data['title'] = "Farmer";
        Job::create($data);

        $data['title'] = "Guard";
        Job::create($data);

        $data['title'] = "Servants";
        Job::create($data);

        $data['title'] = "Cleaning";
        Job::create($data);
    }
}


