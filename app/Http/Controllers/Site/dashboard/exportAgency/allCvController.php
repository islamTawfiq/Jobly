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
            'country_id'     => 'required|integer',
            'city'           => 'required|string',
            'age'            => 'required|string',
            'religion'       => 'required|string',
            'children'       => 'required|string',
            'mobile'         => 'required|string',
            'job_id'         => 'required|integer',
            'salary'         => 'required|string',
            'fees'           => 'required|string',
            'noneExperience' => 'sometimes|nullable|integer',
            'experience1'    => 'sometimes|nullable|string',
            'experience2'    => 'sometimes|nullable|string',
            'experience3'    => 'sometimes|nullable|string',
            'country_ex1'    => 'sometimes|nullable|string',
            'country_ex2'    => 'sometimes|nullable|string',
            'country_ex3'    => 'sometimes|nullable|string',
            'marital_status' => 'required|string',
            'education'      => 'required|string',
            'height'         => 'required|string',
            'weight'         => 'required|string',
            'arabic_lang'    => 'required|string',
            'english_lang'   => 'required|string',
            'medical'        => 'sometimes|max:100000|mimes:doc,docx,pdf,jpeg,png,jpg',
            'passport'       => 'sometimes|max:100000|mimes:doc,docx,pdf,jpeg,png,jpg',
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

        $request->noneExperience  == 1 ? $data['noneExperience'] = '1'  : $data['noneExperience'] = '0';

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
