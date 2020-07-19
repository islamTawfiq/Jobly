<?php

namespace App\Http\Controllers\Admin\settings;
use App\Http\Controllers\Controller;
use App\Model\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:settings_show', ['only' => 'index']);
        $this->middleware('permission:settings_edit', ['only' => 'store']);
    }
    public function index()
    {
        $settings = Settings::first();
        return view('admin.settings.index', compact('settings'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'fullName' => 'sometimes|nullable',
            'mail' => 'required|email',
            'address' => 'sometimes|nullable|required',
            'fax' => 'sometimes|nullable|nullable',
            'mobileNumber' => 'sometimes|nullable|numeric',
            'facebookUrl' => 'sometimes|nullable',
            'googleUrl' => 'sometimes|nullable',
            'linkedinUrl' => 'sometimes|nullable',
            'twitterUrl' => 'sometimes|nullable',
            'instagramUrl' => 'sometimes|nullable',
            'youtubeUrl' => 'sometimes|nullable',
            'gitHupUrl' => 'sometimes|nullable',
            'logo' => 'sometimes|nullable|image',
            'icon' => 'sometimes|nullable|image',
            'keyWords' => 'sometimes|nullable',
            'description' => 'sometimes|nullable',
        ]);


            $request->hasFile('logo') ?  $data['logo'] = $this->storeFile($request->logo) : '';
            $request->hasFile('icon') ?  $data['icon'] = $this->storeFile($request->icon) : '';

        Settings::first()->update($data);
        return redirect()->back()->with('success', 'Settings Have Been Updated Successfully');
    }
}
