<?php

namespace App\Http\Controllers\Site\dashboard\importAgency;

use App\Http\Controllers\Controller;
use App\Model\Nanny;
use Illuminate\Http\Request;

class myOrdersController extends Controller
{

    public function index()
    {
        $user = Auth()->user();
        $nannies = $user->nanny_reserve->where('status', 1);
        return view('site.importAgencyDashboard.myOrders', compact('nannies'));
    }
    public function rejectNanny($id)
    {
        $nanny = Nanny::findorfail($id);
        $nanny->status = 0;
        $nanny->date = null;
        $nanny->time = null;
        $nanny->save();
        return redirect()->back()->with('success', 'Nanny canceled successfully');
    }


}
