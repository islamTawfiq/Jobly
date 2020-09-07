<?php

namespace App\Http\Controllers\Site\nannyProfile;

use App\Http\Controllers\Controller;
use App\Model\Like;
use App\Model\Nanny;
use App\Model\Reservation;
use App\Model\User;
use App\Notifications\AddReservetion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            if (Auth::check()) {
                $likes = Like::where([
                    'nanny_id'=>$id ,
                    'user_id'=>auth()->user()->id
                ])->first();
                return view('site.nannyProfile.profile', compact('nanny','skills','images','randomNannies','reservation','likes'));
            }
        return view('site.nannyProfile.profile', compact('nanny','skills','images','randomNannies','reservation'));
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

    public function download($id)
    {
        $nanny = Nanny::findOrFail($id);
        $skills = explode( "," , $nanny->skills );
        return view('site.nannyProfile.downloadCv', compact('nanny','skills'));
    }

    public function like(Request $request)
    {
        $like_status = $request->like_status;
        $nanny_id = $request->nanny_id;

        $like = Like::where([
            'nanny_id'=>$nanny_id ,
            'user_id'=>auth()->user()->id
        ])->first();

        if(!$like) {
            $new_like = new Like;
            $new_like->nanny_id = $nanny_id;
            $new_like->user_id = auth()->user()->id;
            $new_like->like = 1;
            $new_like->save();

            $isLike = 1;

        } else {
            Like::where([
                'nanny_id'=>$nanny_id ,
                'user_id'=>auth()->user()->id
            ])->delete();

            $isLike = 0;

        }

        $response = ['isLike' => $isLike];

        return response()->json($response ,200);

    }

    // public function download($id)
    // {
    //     $nanny = Nanny::findOrFail($id);
    //     // $skills = explode( "," , $nanny->skills );
    //     $data = ['nanny' => Nanny::findOrFail($id),
    //              'skills' => explode( "," , $nanny->skills )
    //             ];
    //     $pdf = PDF::loadView('site.nannyProfile.downloadCv', $data);

    //     return $pdf->download('codingdriver.pdf');
    // }


}
