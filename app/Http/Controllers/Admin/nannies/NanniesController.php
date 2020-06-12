<?php

namespace App\Http\Controllers\Admin\nannies;
use App\Http\Controllers\Controller;
use App\Model\Nanny;
use DataTables;
use Illuminate\Http\Request;

class NanniesController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:nannies_show', ['only' => 'index', 'show']);
        $this->middleware('permission:nannies_add', ['only' => 'store', 'create']);
        $this->middleware('permission:nannies_edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:nannies_delete', ['only' => 'destroy']);
    }
    public function index(Request $request)
    {
        if ($request->ajax()){
            $items = Nanny::latest()->get();
            return DataTables::of($items)->make(true);
        }
        return view('admin.nannies.index');
    }

    public function destroy($id)
    {
        $item = Nanny::findorfail($id)->delete();
        if (Nanny::find($id)) {
            return response()->json(false, 404);
        } else {
            return response()->json(true, 202);
        }
    }
}
