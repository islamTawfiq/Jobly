<?php

namespace App\Http\Controllers;

use App\Model\AboutUs;
use App\Model\Nanny;
use App\Model\Link;
use App\Model\Start;

class HomeController extends Controller
{

    public function index()
    {
        $nannies = Nanny::get();
        $about = AboutUs::first();
        $start = Start::first();
        return view('site.home.index', compact('nannies','about','start'));
    }
}
