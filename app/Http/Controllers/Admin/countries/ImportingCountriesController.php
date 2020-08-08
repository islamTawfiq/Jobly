<?php

namespace App\Http\Controllers\Admin\countries;

use App\Http\Controllers\Controller;
use App\Model\ImportingCountry;
use DataTables;
use Illuminate\Http\Request;

class ImportingCountriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:skills_show', ['only' => 'index', 'show']);
        $this->middleware('permission:skills_add', ['only' => 'store', 'create']);
        $this->middleware('permission:skills_edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:skills_delete', ['only' => 'destroy']);
    }

    public function index(Request $request)
    {
        if ($request->ajax()){
            $items = ImportingCountry::latest()->get();
            return DataTables::of($items)->make(true);
        }
        return view('admin.importingCountries.index');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'phonecode' => 'required|integer',
        ]);
        ImportingCountry::create($data);
        return redirect()->back()->with('success', 'Created Successfully');
    }

    public function edit($id)
    {
        $item = ImportingCountry::findorfail($id);
        return view('admin.importingCountries.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {

        $item = ImportingCountry::findorfail($id);
        $data = $request->validate([
            'name' => 'required|string',
            'phonecode' => 'required|integer',
        ]);

        $item->update($data);
        return redirect()->back()->with('success', 'Updated Successfully');

    }

    public function destroy($id)
    {
        $item = ImportingCountry::findorfail($id)->delete();
        if (ImportingCountry::find($id)){
            return response()->json(false,404);
        }else{
            return response()->json(true,202);
        }
    }
}
