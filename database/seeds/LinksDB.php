<?php

use Illuminate\Database\Seeder;
use App\Model\Link;

class LinksDB extends Seeder

{
    public function run()
    {
        $data['home'] = "Home";
        $data['domestic_workers'] = "Domestic Workers";
        $data['local_domestic_workers'] = "Local Domestic Workers";
        $data['about'] = "About";
        $data['contact'] = "Contact Us";
        $data['sourcing_broker'] = "Domestic Workers Sourcing Broker";
        $data['sourcing_agency'] = "Domestic Workers Sourcing Agency";
        $data['recruitment_agency'] = "Domestic Workers Recruitment Agency";
        $data['sponsorship'] = "Domestic Workers Sponsorship";
        Link::create($data);

    }
}


