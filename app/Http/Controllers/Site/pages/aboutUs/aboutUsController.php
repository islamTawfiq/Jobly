<?php

namespace App\Http\Controllers\Site\Pages\aboutUs;

use App\Http\Controllers\Controller;
use App\Model\AboutUs;

class aboutUsController extends Controller
{

    public function index()
    {
        $item = AboutUs::first();
        return view('site.pages.aboutUs.index', compact('item'));
    }


}
