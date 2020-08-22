<?php

namespace App\Http\Controllers\Site\dashboard\broker;

use App\Http\Controllers\Controller;
use App\Model\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class myCvController extends Controller
{

    public function index()
    {
        // $user = Auth()->user();
        // $nannies = $user->nannies()->where('status', '<>' , 0)->paginate(10);

        $id = Auth()->user()->id;
        $reservations = Reservation::get();
        $nannies = (Reservation::where('broker_id',$id))->latest()->paginate(10);
        return view('site.brokerDashboard.myCvs', compact('nannies'));
    }


}
