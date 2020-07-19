<?php

namespace App\Http\Controllers\Site\dashboard\exportAgency;

use App\Http\Controllers\Controller;
use App\Model\Nanny;
use Illuminate\Http\Request;

class interviewsController extends Controller
{

    public function index()
    {
        $user = Auth()->user();
        $nannies = $user->nannies->where('status', 2);
        return view('site.exportAgencyDashboard.interviews', compact('nannies'));
    }

}
