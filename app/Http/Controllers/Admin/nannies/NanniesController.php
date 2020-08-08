<?php

namespace App\Http\Controllers\Admin\nannies;
use App\Http\Controllers\Controller;
use App\Model\Nanny;
use App\Model\Skills;
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


    public function edit($id)
    {
        $nanny = Nanny::findorfail($id);
        $skills = Skills::get();
        $arrSkill = $nanny->skills;
        $arrSkill = explode( "," , $arrSkill );
        $arrGallery = $nanny->gallery;
        $arrGallery = explode( "," , $arrGallery );
        return view('admin.nannies.edit', compact('nanny','skills','arrSkill','arrGallery'));
    }

    public function update(Request $request, $id)
    {

        $item = Nanny::findorfail($id);

        $data = $request->validate([
            'main_image'     => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'first_name'     => 'required|string',
            'last_name'      => 'required|string',
            'mobile'         => 'required|unique:nannies,mobile,' . $id,
            'country_id'     => 'required|integer',
            'city'           => 'required|string',
            'age'            => 'required|integer',
            'religion'       => 'required|string',
            'children'       => 'required|integer',
            'job_id'         => 'required|integer',
            'salary'         => 'required|integer',
            'experience'     => 'required|integer',
            'marital_status' => 'required|string',
            // 'education'      => 'required|string',
            'height'         => 'required|integer',
            'weight'         => 'required|integer',
            'arabic_lang'    => 'required|string',
            'english_lang'   => 'required|string',
            'about'          => 'required|string',
            'skills'         => 'required',
            'gallery'        => 'sometimes',
            'gallery.*'      => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $data['broker_id'] = auth()->user()->id;
        $data['name'] = $data['first_name'] . ' ' . $data['last_name'];
        $request->hasFile('main_image') ?  $data['main_image'] = $this->storeFile($request->main_image, 'Nannies') : '';

        if($request->hasfile('gallery'))
        {

           foreach($request->file('gallery') as $image)
           {
               $name=$image->getClientOriginalName();
               $image->move(public_path().'/gallery/', $name);
               $gallery[] = $name;
           }
           $data['gallery'] = implode( "," , $gallery );
        }

        $data['skills'] = implode( "," , $data['skills'] );

        $item->update($data);
        return redirect()->back()->with('success', 'Nanny Updated Successfully');

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
