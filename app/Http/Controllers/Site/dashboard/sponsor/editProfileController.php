<?php

namespace App\Http\Controllers\Site\dashboard\sponsor;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class editProfileController extends Controller
{

    public function edit()
    {
        $user = auth()->User();
        return view('site.sponsorDashboard.editProfile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->User();
        // $phone = $user->phone;
        $data = $request->validate([
            'first_name'     => 'required|string',
            'last_name'    => 'required|string',
            'country'       => 'required|string',
            'address'       => 'required|string',
            'phone'           => 'required',
            'email'           => 'required|email|',
        ]);

        if ($request->has('password') && request('password') != null) {
            $data['password'] = $request->validate([
                'password' => 'required|confirmed|min:6',
            ]);
            $data['password'] = Hash::make($request->password);
        }
        // if ( $phone != $data['phone'] && $data['phone'] != null ) {
        //     $data['code'] = SendCode::sendCode($data['phone']);
        //     $data['active'] = 0 ;
        //     $user->update($data);
        //     return redirect('/verify')->with('success', 'Thanks, Please Verify Code');
        // }
         $user->update($data);
         return redirect()->back()->with('success', 'Updated Successfully');
}


}
