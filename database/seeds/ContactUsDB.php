<?php

use Illuminate\Database\Seeder;
use App\Model\ContactUs;

class ContactUsDB extends Seeder

{
    public function run()
    {
        $data['text_en'] = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque eaque, excepturi voluptas aut reiciendis assumenda cupiditate quos pariatur ratione! Vero quis, molestias voluptatem commodi omnis impedit odit eius! Suscipit, qui?";
        $data['text_ar'] = "و هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق ";
        $data['mobile'] = "937 3382 28 3826" ;
        ContactUs::create($data);

    }
}


