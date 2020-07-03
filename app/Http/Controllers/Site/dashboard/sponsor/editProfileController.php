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
        $data = $request->validate([
            'first_name'     => 'required|string',
            'last_name'    => 'required|string',
            'phone'           => 'required',
            'email'           => 'required|email|',
        ]);

        if ($request->has('password') && request('password') != null) {
            $data['password'] = $request->validate([
                'password' => 'required|confirmed|min:6',
            ]);
            $data['password'] = Hash::make($request->password);
        }
         $user->update($data);
         return redirect()->back()->with('success', trans('updated successfully'));
}


}