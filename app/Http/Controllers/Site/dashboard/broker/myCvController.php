<?php

namespace App\Http\Controllers\Site\dashboard\broker;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class myCvController extends Controller
{

    public function index()
    {
        
        return view('site.brokerDashboard.myCvs');
    }


}
