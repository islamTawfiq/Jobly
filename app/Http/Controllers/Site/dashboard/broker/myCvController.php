<?php

namespace App\Http\Controllers\Site\dashboard\broker;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class myCvController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('permission:clients_show', ['only' => 'index', 'show']);
    //     $this->middleware('permission:clients_add', ['only' => 'store', 'create']);
    //     $this->middleware('permission:clients_edit', ['only' => 'edit', 'update']);
    //     $this->middleware('permission:clients_delete', ['only' => 'destroy']);
    // }

    public function index()
    {
        return view('site.brokerDashborad.myCvs');
    }


}
