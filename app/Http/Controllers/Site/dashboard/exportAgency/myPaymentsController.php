<?php

namespace App\Http\Controllers\Site\dashboard\exportAgency;

use App\Http\Controllers\Controller;

class myPaymentsController extends Controller
{

    public function index()
    {
        return view('site.exportAgencyDashboard.payments');
    }

}
