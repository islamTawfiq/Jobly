<?php

namespace App\Http\Controllers\Site\dashboard\sponsor;

use App\Http\Controllers\Controller;

class myPaymentsController extends Controller
{

    public function index()
    {
        return view('site.sponsorDashboard.payments');
    }

}
