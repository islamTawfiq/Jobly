<?php

namespace App\Http\Controllers\Site\help;

use App\Http\Controllers\Controller;
use App\Model\Help;
use Illuminate\Http\Request;

class helpController extends Controller
{

    public function help(Request $request) {
        $data = $request->validate([
            'email'      => 'required|email|string',
            'question'   => 'required|string',
        ]);
        Help::create($data);
        return redirect()->back()->with('success', 'Question Send Successfully');
    }

}
