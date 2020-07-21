<?php

namespace App\Http\Controllers\Site\dashboard\exportAgency;

use App\Http\Controllers\Controller;
use App\Model\Nanny;


class myCvController extends Controller
{

    public function index()
    {
        $user = Auth()->user();
        $nannies = $user->nannies()->where('status', '<>' , 0)->paginate(10);
        return view('site.exportAgencyDashboard.myCvs', compact('nannies'));
    }


}
