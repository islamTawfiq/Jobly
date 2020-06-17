<?php

namespace App\Http\Controllers\Site\Pages\terms;

use App\Http\Controllers\Controller;
use App\Model\Terms;

class termsController extends Controller
{

    public function index()
    {
        $item = Terms::first();
        return view('site.pages.terms.index', compact('item'));
    }


}
