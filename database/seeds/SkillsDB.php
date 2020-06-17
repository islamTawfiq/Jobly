<?php

use Illuminate\Database\Seeder;
use App\Model\Skills;

class SkillsDB extends Seeder

{
    public function run()
    {
        $data['skill'] = "Driving";
        Skills::create($data);

        $data['skill'] = "Cooking";
        Skills::create($data);

        $data['skill'] = "Ironing";
        Skills::create($data);

        $data['skill'] = "Cleaning";
        Skills::create($data);

        $data['skill'] = "Tutoring";
        Skills::create($data);

    }
}


