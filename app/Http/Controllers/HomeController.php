<?php

namespace App\Http\Controllers;

use App\Model\AboutUs;
use App\Model\Nanny;

class HomeController extends Controller
{

    public function index()
    {
        $nannies = Nanny::get();
        $about = AboutUs::first();
        return view('site.home.index', compact('nannies','about'));
    }
}
