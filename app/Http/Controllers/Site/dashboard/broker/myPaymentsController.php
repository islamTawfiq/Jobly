<?php

namespace App\Http\Controllers\Site\dashboard\broker;

use App\Http\Controllers\Controller;

class myPaymentsController extends Controller
{

    public function index()
    {
        return view('site.brokerDashboard.payments');
    }

}
