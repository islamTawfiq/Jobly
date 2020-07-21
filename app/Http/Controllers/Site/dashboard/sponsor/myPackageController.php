<?php

namespace App\Http\Controllers\Site\dashboard\sponsor;

use App\Http\Controllers\Controller;

class myPackageController extends Controller
{

    public function index()
    {
        return view('site.sponsorDashboard.package');
    }

}
