<?php

namespace App\Http\Controllers\Site\countries;

use App\Http\Controllers\Controller;
use App\Model\State;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    public function getStates(Request $request)
    {
        $item = State::where('country_id',$request->country_id)->pluck("name", "id");
        return response()->json($item);
    }
}
