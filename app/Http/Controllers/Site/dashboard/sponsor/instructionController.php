<?php

namespace App\Http\Controllers\Site\dashboard\sponsor;

use App\Http\Controllers\Controller;
use App\Model\Instruction;


class instructionController extends Controller
{

    public function index()
    {
        $item = Instruction::find(3);
        return view('site.sponsorDashboard.instruction', compact('item'));
    }

}
