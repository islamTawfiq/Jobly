<?php

namespace App\Http\Controllers\Site\dashboard\broker;

use App\Http\Controllers\Controller;
use App\Model\Skills;
use App\Model\Nanny;
use Illuminate\Http\Request;


class addCvController extends Controller
{


    public function index()
    {
        $skills = Skills::get();
        return view('site.brokerDashboard.addCvs', compact('skills'));
    }

    public  function  addCv (Request $request){

            $data = $request->validate([
                'main_image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
                'about'          => 'required|string',
                'skills'         => 'required',
                'gallery'        => 'sometimes',
                'gallery.*'      => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'passport'       => 'sometimes',
                'passport.*'     => 'mimes:doc,docx,pdf,jpeg,png,jpg|max:100000',
                'medical'        => 'sometimes',
                'medical.*'      => 'mimes:doc,docx,pdf,jpeg,png,jpg|max:100000',
            ]);

            $data['broker_id'] = auth()->user()->id;
            $data['name'] = $data['first_name'] . ' ' . $data['last_name'];

            $request->hasFile('main_image') ?  $data['main_image'] = $this->storeFile($request->main_image, 'Nannies') : '';

            if($request->hasfile('gallery') && $request->hasfile('gallery') != '' )
            {
                foreach($request->file('gallery') as $image)
                {
                   $name=$image->getClientOriginalName();
                   $image->move(public_path().'/gallery/', $name);
                   $gallery[] = $name;
                }
                $data['gallery'] = implode( "," , $gallery );
            }

            if($request->hasfile('passport') && $request->hasfile('passport') != '' )
            {
                foreach($request->file('passport') as $image)
                {
                   $name=$image->getClientOriginalName();
                   $image->move(public_path().'/passport/', $name);
                   $passport[] = $name;
                }
                $data['passport'] = implode( "," , $passport );
            }

            if($request->hasfile('medical') && $request->hasfile('medical') != '' )
            {
                foreach($request->file('medical') as $image)
                {
                   $name=$image->getClientOriginalName();
                   $image->move(public_path().'/medical/', $name);
                   $medical[] = $name;
                }
                $data['medical'] = implode( "," , $medical );
            }

            $data['skills'] = implode( "," , $data['skills'] );

            $request->noneExperience  == 1 ? $data['noneExperience'] = '1'  : $data['noneExperience'] = '0';

            Nanny::create($data);
            return redirect('/broker-dashboard/all-cvs')->with('success', 'cv created successfully');
        }



}


