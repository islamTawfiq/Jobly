<?php

namespace App\Http\Controllers\Site\dashboard\sponsor;

use App\Http\Controllers\Controller;
use App\Model\Nanny;
use App\Model\User;
use App\Model\Reservation;
use Illuminate\Http\Request;


class myOrdersController extends Controller
{

    public function index()
    {
        $id = Auth()->user()->id;
        // dd($id);
        $reserv = Reservation::get();
        // dd($reserv);
        $nannies = (\App\Model\Reservation::where('import_id',$id))->with('workers')->where('status', 1)->get();
        // $nannies = $nannies->workers;
        // $nannies = $user->nanny_reserve->where('status', 1);
        return view('site.sponsorDashboard.myOrders', compact('nannies'));
    }
    public function rejectNanny($id)
    {
        $nanny = Reservation::findorfail($id);
        $nanny->status = 0;
        $nanny->date = null;
        $nanny->time = null;
        // $nanny->notes = $request->notes;
        $nanny->save();
        return redirect()->back()->with('success', 'Nanny rejected successfully');
    }

    public function notes(Request $request, $id)
    {
        $item = Reservation::findorfail($id);
        $data = $request->validate([
            'notes'     => 'sometimes|nullable|string',
        ]);
        $item->update($data);
        // Nanny::create($data);
        return redirect()->back()->with('success', 'notes send successfully');

    }


}
