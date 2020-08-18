<?php

namespace App\Http\Controllers\Admin\reservations;
use App\Http\Controllers\Controller;
use App\Model\Reservation;
use DataTables;
use Illuminate\Http\Request;

class reservationController extends Controller
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
        if ($request->ajax()) {
            $items = Reservation::latest()->get();
            return DataTables::of($items)->make(true);
        }
        return view('admin.reservations.index');
    }

    public function destroy($id)
    {
        $item = Reservation::findorfail($id)->delete();
        if (Reservation::find($id)){
            return response()->json(false,404);
        }else{
            return response()->json(true,202);
        }
    }
}
