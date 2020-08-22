<?php

use Illuminate\Database\Seeder;
use App\Model\Start;

class StartDB extends Seeder

{
    public function run()
    {
        $data['family'] = "We're family we want to hire a domestic helper";
        $data['family_instruction1'] = "Search for candidates";
        $data['family_instruction2'] = " Interview candidate";
        $data['family_instruction3'] = "Hire applicants from good agency";
        $data['sourcing'] = "We are sourcing agency We want to join now";
        $data['sourcing_instruction1'] = "To present good candidates profiles";
        $data['sourcing_instruction2'] = "To facilities candidates interview for recruiters";
        $data['sourcing_instruction3'] = "To assist recruiters to get their demand applicants";
        $data['agent'] = "I am a sub-agent want to join now";
        $data['agent_instruction1'] = "Have good recruitment experiences";
        $data['agent_instruction2'] = "Hardworking to provide good services";
        $data['agent_instruction3'] = "Match the recruiters demands";
        Start::create($data);

    }
}


