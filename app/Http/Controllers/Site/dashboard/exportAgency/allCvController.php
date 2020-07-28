<?php

namespace App\Http\Controllers\Site\dashboard\exportAgency;

use App\Http\Controllers\Controller;
use App\Model\Skills;
use App\Model\Nanny;
use Illuminate\Http\Request;


class allCvController extends Controller
{

    public function index()
    {

        $user = Auth()->user();
        $nannies = $user->nannies()->paginate(10);
        $skills = Skills::get();
        return view('site.exportAgencyDashboard.allCvs', compact('nannies'));
    }

    public function edit($id)
    {
        $nanny = Nanny::findorfail($id);
        $skills = Skills::get();
        $arrSkill = $nanny->skills;
        $arrSkill = explode( "," , $arrSkill );
        $arrGallery = $nanny->gallery;
        $arrGallery = explode( "," , $arrGallery );
        return view('site.exportAgencyDashboard.editCv', compact('nanny','skills','arrSkill','arrGallery'));
    }

    public function update(Request $request, $id)
    {

        $item = Nanny::findorfail($id);

        $data = $request->validate([
            'main_image'     => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'first_name'     => 'required|string',
            'last_name'      => 'required|string',
            'mobile'         => 'required|unique:nannies,mobile,' . $id,
            'country_id'     => 'required|string',
            'city'           => 'required|string',
            'age'            => 'required|integer',
            'religion'       => 'required|string',
            'children'       => 'required|integer',
            'job'            => 'required|string',
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
        $item = Nanny::findorfail($id);
        $item->delete();
        return redirect()->back()->with('success', 'Nanny Deleted Successfully');

    }


}
