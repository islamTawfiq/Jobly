<?php

namespace App\Http\Controllers\Site\dashboard\exportAgency;

use App\Http\Controllers\Controller;
use App\Model\Skills;
use App\Model\Nanny;
use Illuminate\Http\Request;


class instructionController extends Controller
{

    public function index()
    {
        return view('site.exportAgencyDashboard.instruction');
    }

}
