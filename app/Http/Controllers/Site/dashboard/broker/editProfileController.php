<?php

namespace App\Http\Controllers\Site\dashboard\broker;

use App\Http\Controllers\Controller;
use App\Model\SendCode;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class editProfileController extends Controller
{

    public function edit()
    {
        $user = auth()->User();
        return view('site.brokerDashboard.editProfile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->User();
        // $phone = $user->phone;
        $data = $request->validate([
            'first_name'      => 'required|string',
            'last_name'       => 'required|string',
            'country_id'      => 'required|integer',
            'address'         => 'required|string',
            'phonecode'       => 'required|integer',
            'mobileNumber'    => 'required|unique:users,mobileNumber,'.$user->id,
            'phone'           => 'unique:users,phone,'.$user->id,
            'whatsapp'        => 'sometimes|nullable|string',
            'email'           => 'sometimes|nullable|unique:users,email,'.$user->id,
        ]);

        $data['name'] = $data['first_name'] . ' ' . $data['last_name'];
        $data['phone'] = $data['phonecode'] . $data['mobileNumber'];
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
