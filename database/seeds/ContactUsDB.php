<?php

use Illuminate\Database\Seeder;
use App\Model\ContactUs;

class ContactUsDB extends Seeder

{
    public function run()
    {
        $data['text'] = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque eaque, excepturi voluptas aut reiciendis assumenda cupiditate quos pariatur ratione! Vero quis, molestias voluptatem commodi omnis impedit odit eius! Suscipit, qui?";
        $data['mobile'] = "937 3382 28 3826" ;
        ContactUs::create($data);

    }
}


