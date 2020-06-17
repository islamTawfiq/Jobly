<?php

namespace App\Http\Controllers\Site\pages\contactUs;

use App\Http\Controllers\Controller;
use App\Model\ContactUs;

class contactUsController extends Controller
{

    public function index()
    {
        $item = ContactUs::first();
        return view('site.pages.contactUs.index', compact('item'));
    }


}
