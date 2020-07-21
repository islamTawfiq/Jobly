<?php

namespace App\Http\Controllers\Site\dashboard\importAgency;

use App\Http\Controllers\Controller;

class myPaymentsController extends Controller
{

    public function index()
    {
        return view('site.importAgencyDashboard.payments');
    }

}
