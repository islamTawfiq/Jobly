<?php

namespace App\Http\Controllers\Site\dashboard\broker;

use App\Http\Controllers\Controller;
use App\Model\Skills;
use App\Model\Nanny;
use Illuminate\Http\Request;


class clientOrdersController extends Controller
{

    public function index()
    {
        $user = Auth()->user();
        $nannies = $user->nannies->where('status', 1);
        // dd($nannies);
        // $allNanny = Nanny::get();
        return view('site.brokerDashboard.clientOrders', compact('nannies'));
    }

}
