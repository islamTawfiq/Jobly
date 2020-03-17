<?php

namespace App\Http\Controllers\Site\Pages\terms;

use App\Http\Controllers\Controller;
use App\Model\Terms;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;

class termsController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:clients_show', ['only' => 'index', 'show']);
        $this->middleware('permission:clients_add', ['only' => 'store', 'create']);
        $this->middleware('permission:clients_edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:clients_delete', ['only' => 'destroy']);
    }

    public function index()
    {
        $item = Terms::first();
        return view('site.pages.terms.index', compact('item'));
    }


}
