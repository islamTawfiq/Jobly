<?php

namespace App\Http\Controllers\Site\filter;

use App\Http\Controllers\Controller;
use App\Model\Nanny;
use Illuminate\Http\Request;

class filterController extends Controller
{

    public function index()
    {
        $nannies = Nanny::get();

        $n = Nanny::with('broker')->get();

        return view('site.filter.filter', compact('nannies','n'));
    }


}
