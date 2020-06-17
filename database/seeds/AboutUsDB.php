<?php

use Illuminate\Database\Seeder;
use App\Model\AboutUs;

class AboutUsDB extends Seeder

{
    public function run()
    {
        $data['title'] = "Jobly";
        $data['body'] = " is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum";
        $data['img1'] = "";
        $data['img2'] = "";
        $data['img3'] = "";
        $data['img4'] = "";


        AboutUs::create($data);

    }
}


