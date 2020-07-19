<?php

namespace App\Http\Controllers\Site\dashboard\sponsor;

use App\Http\Controllers\Controller;
use App\Model\Nanny;

class interviewsController extends Controller
{

    public function index()
    {
        $user = Auth()->user();
        $nannies = $user->nanny_reserve->where('status', 2);
        return view('site.sponsorDashboard.interviews', compact('nannies'));
    }
    public function rejectNanny($id)
    {
        $nanny = Nanny::findorfail($id);
        $nanny->status = 0;
        $nanny->reserve_id = null;
        $nanny->date = null;
        $nanny->time = null;
        $nanny->save();
        return redirect()->back()->with('success', 'Nanny canceled successfully');
    }
    public function aproveNanny($id)
    {
        $nanny = Nanny::findorfail($id);
        $nanny->status = 3;
        $nanny->date = null;
        $nanny->time = null;
        $nanny->save();
        return redirect()->back()->with('success', 'Nanny hired successfully');
    }


}
