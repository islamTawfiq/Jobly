<?php

namespace App\Http\Controllers\Site\dashboard\broker;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class myCvController extends Controller
{

    public function index()
    {
        $user = Auth()->user();
        $nannies = $user->nannies()->where('status', '<>' , 0)->paginate(10);
        return view('site.brokerDashboard.myCvs', compact('nannies'));
    }


}
