<?php

namespace App\Http\Controllers\Site\nannyProfile;

use App\Http\Controllers\Controller;
use App\Model\Nanny;
use Illuminate\Http\Request;

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

        return view('site.nannyProfile.profile', compact('nanny','skills','images','randomNannies'));
    }

    public function reservation(Request $request, $id)
    {
        $item = Nanny::findorfail($id);
        $data = $request->validate([
            'time'           => 'required|date_format:H:i',
            'date'           => 'required|date',
        ]);
        $data['reserve_id'] = auth()->user()->id;
        $data['status'] = 1;
        $item->update($data);
        return redirect()->back()->with('success', 'You Confirm the interview, we will give you the feedback shortly');
    }


}
