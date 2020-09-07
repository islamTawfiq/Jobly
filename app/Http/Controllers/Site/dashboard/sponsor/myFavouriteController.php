<?php

namespace App\Http\Controllers\Site\dashboard\sponsor;

use App\Http\Controllers\Controller;
use App\Model\Like;

class myFavouriteController extends Controller
{

    public function index()
    {
        $user = auth()->user()->id;
        $likes = (Like::where('user_id', $user ))->with('nanny')->get();
        // dd($likes->toArray());
        $nannies = [];
        foreach($likes as $like) {
            $nannies[] = $like->nanny()->where('status', '<>', 3)->latest()->paginate(10);
        }
        $nannies = $nannies;
        return view('site.sponsorDashboard.myFavourit', compact('nannies'));
    }

}
