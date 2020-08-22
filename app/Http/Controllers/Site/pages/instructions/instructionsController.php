<?php

namespace App\Http\Controllers\Site\Pages\instructions;

use App\Http\Controllers\Controller;
use App\Model\Instruction;

class instructionsController extends Controller
{

    public function index()
    {
        $item = Instruction::first();
        return view('site.pages.aboutUs.index', compact('item'));
    }


}
