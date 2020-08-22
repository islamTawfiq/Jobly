<?php

namespace App\Http\Controllers\Site\dashboard\exportAgency;

use App\Http\Controllers\Controller;
use App\Model\Instruction;

class instructionController extends Controller
{

    public function index()
    {
        $item = Instruction::find(2);
        return view('site.exportAgencyDashboard.instruction', compact('item'));
    }

}
