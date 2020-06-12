<?php

use Illuminate\Database\Seeder;
use App\Model\Skills;

class SkillsDB extends Seeder

{
    public function run()
    {
        $data['skill_en'] = "Driving";
        $data['skill_ar'] = "القياده";
        Skills::create($data);

        $data['skill_en'] = "Cooking";
        $data['skill_ar'] = "الطبخ";
        Skills::create($data);

        $data['skill_en'] = "Ironing";
        $data['skill_ar'] = "كى الملابس";
        Skills::create($data);

        $data['skill_en'] = "Cleaning";
        $data['skill_ar'] = "التنظيف";
        Skills::create($data);

        $data['skill_en'] = "Tutoring";
        $data['skill_ar'] = "التدريس";
        Skills::create($data);

    }
}


