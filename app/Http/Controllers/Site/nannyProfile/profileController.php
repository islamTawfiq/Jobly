<?php

namespace App\Http\Controllers\Site\nannyProfile;

use App\Http\Controllers\Controller;
use App\Model\Nanny;
use App\Model\Reservation;
use App\Model\User;
use App\Notifications\AddReservetion;
use Illuminate\Http\Request;
use Notification;

class profileController extends Controller
{

    public function index($id)
    {
        $nanny = Nanny::findOrFail($id);
        $randomNannies = Nanny::where('id','<>',$id)->get();
        if ( !$randomNannies->isEmpty() && $randomNannies->count() >= 3 ) {
            $randomNannies = $randomNannies->random(3);
        } else {
        }
        $skills = explode( "," , $nanny->skills );
        $images = explode( "," , $nanny->gallery );
        $reservation = (Reservation::where('nanny_id',$id))->get();
        // dd($reservation);

        return view('site.nannyProfile.profile', compact('nanny','skills','images','randomNannies'));
    }

    public function reservation(Request $request, $id, $broker_id)
    {
        $data = $request->validate([
            'time'           => 'required|date_format:H:i',
            'date'           => 'required|date',
        ]);
        $data['nanny_id'] = $id;
        $data['broker_id'] = $broker_id;
        $data['import_id'] = auth()->user()->id;
        $data['status'] = 1;

        if($data = Reservation::create($data)) {
            $users['broker'] = User::find($broker_id);
            $users['admin'] = User::find(1);
            Notification::send($users, new AddReservetion($data));

            $nanny_id = $data['nanny_id'];
            $worker = Nanny::findOrFail($nanny_id);
            $mynanny['status'] = 1;
            $worker->update($mynanny);
        }
        return redirect()->back()->with('success', 'You Confirm the interview, we will give you the feedback shortly');
    }


}
