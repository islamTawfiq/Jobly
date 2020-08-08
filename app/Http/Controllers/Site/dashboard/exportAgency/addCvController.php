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
                'age'            => 'required|integer',
                'religion'       => 'required|string',
                'children'       => 'required|string',
                'job_id'         => 'required|integer',
                'salary'         => 'required|string',
                'fees'           => 'required|string',
                'experience'     => 'required|string',
                'country_ex'     => 'required|string',
                'marital_status' => 'required|string',
                'education'      => 'required|string',
                'height'         => 'required|integer',
                'weight'         => 'required|integer',
                'arabic_lang'    => 'required|string',
                'english_lang'   => 'required|string',
                'medical'        => 'sometimes|max:100000|mimes:doc,docx,pdf',
                'passport'       => 'required|max:100000|mimes:doc,docx,pdf',
                'about'          => 'required|string',
                'skills'         => 'required',
                'gallery'        => 'sometimes',
                'gallery.*'      => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            $data['broker_id'] = auth()->user()->id;
            $data['name'] = $data['first_name'] . ' ' . $data['last_name'];

            $request->hasFile('main_image') ?  $data['main_image'] = $this->storeFile($request->main_image, 'Nannies') : '';

            $request->hasFile('medical') ?  $data['medical'] = $this->storeFile($request->medical, 'Medical') : '';
            $request->hasFile('passport') ?  $data['passport'] = $this->storeFile($request->passport, 'Passport') : '';

            if($request->hasfile('gallery'))
            {

                foreach($request->file('gallery') as $image)
                {
                   $name=$image->getClientOriginalName();
                   $image->move(public_path().'/gallery/', $name);
                   $gallery[] = $name;
                }
            }

            $data['gallery'] = implode( "," , $gallery );
            $data['skills'] = implode( "," , $data['skills'] );
            Nanny::create($data);
            return redirect('/broker-dashboard/all-cvs')->with('success', 'cv created successfully');
        }



}


