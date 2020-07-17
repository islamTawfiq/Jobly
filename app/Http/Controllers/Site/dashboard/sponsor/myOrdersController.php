<?php

namespace App\Http\Controllers\Site\dashboard\sponsor;

use App\Http\Controllers\Controller;
use App\Model\Nanny;
// use Illuminate\Http\Request;

class myOrdersController extends Controller
{

    public function index()
    {
        $user = Auth()->user();
        $nannies = $user->agency_reserve->where('status', 1);
        return view('site.sponsorDashboard.myOrders', compact('nannies'));
    }
    public function rejectNanny($id)
    {
        $nanny = Nanny::findorfail($id);
        $nanny->status = 0;
        $nanny->agency_id = null;
        $nanny->save();
        return redirect()->back()->with('success', 'Nanny rejected successfully');
    }


}
