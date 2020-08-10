<?php

use Illuminate\Database\Seeder;
use App\Model\Skills;

class SkillsDB extends Seeder

{
    public function run()
    {
        $data['skill'] = "Baby, Child care";
        Skills::create($data);

        $data['skill'] = "Cleaning";
        Skills::create($data);

        $data['skill'] = "E-Marketing";
        Skills::create($data);

        $data['skill'] = "Elderly care";
        Skills::create($data);

        $data['skill'] = "Food and drink service";
        Skills::create($data);

        $data['skill'] = "Gardening";
        Skills::create($data);

        $data['skill'] = "Handy-crafts";
        Skills::create($data);

        $data['skill'] = "Handy-works";
        Skills::create($data);

        $data['skill'] = "Hospitality";
        Skills::create($data);

        $data['skill'] = "Internet";
        Skills::create($data);

        $data['skill'] = "Nursing";
        Skills::create($data);

        $data['skill'] = "Office management";
        Skills::create($data);

        $data['skill'] = "Receptionist, reception clerk";
        Skills::create($data);

        $data['skill'] = "Sewing";
        Skills::create($data);

        $data['skill'] = "Other";
        Skills::create($data);

    }
}


