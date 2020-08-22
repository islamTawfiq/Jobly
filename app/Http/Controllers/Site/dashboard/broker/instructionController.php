<?php

namespace App\Http\Controllers\Site\dashboard\broker;

use App\Http\Controllers\Controller;
use App\Model\Instruction;

class instructionController extends Controller
{

    public function index()
    {
        $item = Instruction::find(1);
        return view('site.brokerDashboard.instruction', compact('item'));
    }

}
