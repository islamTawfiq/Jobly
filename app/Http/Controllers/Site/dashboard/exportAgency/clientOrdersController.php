<?php

namespace App\Http\Controllers\Site\dashboard\exportAgency;

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
        return view('site.exportAgencyDashboard.clientOrders', compact('nannies'));
    }
    public function confirmNanny($id)
    {
        $nanny = Nanny::findorfail($id);
        $nanny->status = 2;
        // $nanny->reserve_id = null;
        $nanny->save();
        return redirect()->back()->with('success', 'Interview Confirmed Successfully');
    }
    public function rejectNanny($id)
    {
        $nanny = Nanny::findorfail($id);
        $nanny->status = 0;
        $nanny->reserve_id = null;
        $nanny->save();
        return redirect()->back()->with('success', 'Nanny rejected successfully');
    }

}
