<?php

namespace App\Http\Controllers\Site\auth\verify;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;

class verifyController extends Controller
{

    public function __construct()
    {
       $this->middleware('verify');
    }
    public function getVerify()
    {
        return view('auth.verify.verify');
    }

    public function postVerify(Request $request)
    {
        if($user=User::where('code',$request->code)->first() and $request->code != null ) {
            $user->active = 1;
            $user->code = null;
            $user->save();
            return redirect('/')->with('success', 'Your Acount Is Active, Please Waite To Accept Your Acount');
        } else {
            return back()->with('error','Verify Code Is Not Correct, Please try Again');
        }
    }


}
