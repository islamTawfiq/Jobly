<?php

namespace App\Http\Controllers\Site\filter;

use App\Http\Controllers\Controller;
use App\Model\Nanny;
use App\Model\Skills;
use Illuminate\Http\Request;

class filterController extends Controller
{

    public function index()
    {
        $nannies = Nanny::paginate(1);
        $n = Nanny::with('broker')->get();
        $skills = Skills::get();

        return view('site.filter.filter', compact('nannies','n','skills'));
    }


    public function filter(Request $request) {

        $country_id = $request->country_id ? $request->country_id : null;
        $religion = $request->religion ? $request->religion : null;
        $marital_status = $request->marital_status ? $request->marital_status : null;
        $getSkills = $request->skills ? $request->skills : [];
        $min = $request->min;
        $max = $request->max;

        $skills = Skills::get();

        $nannies = Nanny::where(function ($q) use ($religion) {
            if ($religion) {
                $q->when($religion, function ($q, $religion) {
                    return $q->where('religion', $religion);
                });
            }
        })->where(function ($q) use ($country_id) {
            if ($country_id) {
                $q->when($country_id, function ($q, $country_id) {
                    return $q->where('country_id', $country_id);
                });
            }
        })->where(function ($q) use ($marital_status) {
            if ($marital_status) {
                $q->when($marital_status, function ($q, $marital_status) {
                    return $q->where('marital_status', $marital_status);
                });
            }
        })->where(function ($q) use ($getSkills) {
            if ($getSkills) {
                foreach ($getSkills as $skill) {
                    $q->when($skill, function ($q, $skill) {
                        return $q->where('skills', 'LIKE', '%' . $skill . '%');
                });

                }
            }
        })->where(function ($q) use ($min ,$max) {
            if ($min && $max) {
                $q->where(function ($q) use ($min, $max) {
                    $q->where('age', '>=', $min)->where('age', '<=', $max);
                });
            }
        })
        ->paginate(1);
            return view('site.filter.filter', compact('nannies','skills','getSkills'));

    }


}
