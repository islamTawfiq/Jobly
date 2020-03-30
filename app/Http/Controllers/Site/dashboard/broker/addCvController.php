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
        return view('site.brokerDashborad.addCvs', compact('skills'));
    }

    public  function  addCv (Request $request){

            $data = $request->validate([
                'main_image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'first_name'     => 'required|string',
                'last_name'      => 'required|string',
                'mobile'         => 'required|regex:/(01)[0-9]{9}/|unique:nannies,mobile',
                'country'        => 'required|string',
                'city'           => 'required|string',
                'age'            => 'required|integer',
                'religion'       => 'required|string',
                'children'       => 'required|integer',
                'job'            => 'required|string',
                'salary'         => 'required|integer',
                'experience'     => 'required|integer',
                'marital_status' => 'required|string',
                'education'      => 'required|string',
                'height'         => 'required|integer',
                'weight'         => 'required|integer',
                'arabic_lang'    => 'required|string',
                'english_lang'   => 'required|string',
                'about'          => 'required|string',
                'skills'         => 'required',
                'gallery'        => 'required',
                'gallery.*'      => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
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
            }

            $data['gallery'] = implode( "," , $gallery );
            $data['skills'] = implode( "," , $data['skills'] );
            $user = Nanny::create($data);
            return redirect('/broker-dashboard/add-cv')->with('success', 'cv created successfully');
    }



}
