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
        $skills = explode( "," , $nanny->skills );
        $images = explode( "," , $nanny->gallery );
        return view('site.nannyProfile.profile', compact('nanny','skills','images'));
    }


}
