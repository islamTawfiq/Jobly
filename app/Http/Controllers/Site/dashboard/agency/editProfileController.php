<?php

namespace App\Http\Controllers\Site\dashboard\agency;

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
        return view('site.agencyDashboard.editProfile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->User();
        $data = $request->validate([
            'agency_name'     => 'required|string',
            'manager_name'    => 'required|string',
            'phone'           => 'required|regex:/(01)[0-9]{9}/',
            'telephone'       => 'required|string',
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
