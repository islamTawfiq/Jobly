<?php

namespace App\Http\Controllers\Site\filter;

use App\Http\Controllers\Controller;
use App\Model\Find;
use App\Model\Nanny;
use App\Model\Skills;
use Illuminate\Http\Request;

class filterController extends Controller
{

    public function filterNanny(Request $request) {


        $country_id = $request->country_id ? $request->country_id : null;
        $job_id = $request->job_id ? $request->job_id : null;

        $skills = Skills::get();
        $find = Find::first();

        $nannies = Nanny::where(function ($q) use ($country_id) {
            if ($country_id) {
                $q->when($country_id, function ($q, $country_id) {
                    return $q->where('country_id', $country_id);
                });
            }
        })->where(function ($q) use ($job_id) {
            if ($job_id) {
                $q->when($job_id, function ($q, $job_id) {
                    return $q->where('job_id', $job_id);
                });
            }
        })->paginate(2);
        $nannies = $nannies->unique('id');
        // $query = request()->query();
        // $text = http_build_query($query);
        // $total = $nannies->total();
        // dd($total);
        // $nannies = $nannies->items();
        // $currentPage = \Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPage();
        // $nannies = new \Illuminate\Pagination\LengthAwarePaginator($nannies, $total, 2, $currentPage);
        // return view('site.filter.filter', compact('items','skills','getSkills', 'text'));
        $n = Nanny::with('broker')->get();
        return view('site.filter.filter', compact('nannies','n','skills','find'));
    }

    public function filter(Request $request) {

        $countPerPage = $request->paginateCount ? $request->paginateCount : 10;

        $country_id = $request->country_id ? $request->country_id : null;
        $religion = $request->religion ? $request->religion : null;
        $job_id = $request->job_id ? $request->job_id : null;
        $marital_status = $request->marital_status ? $request->marital_status : null;
        $getSkills = $request->skills ? $request->skills : [];
        $min = $request->min;
        $max = $request->max;

        $skills = Skills::get();

        if(request()->ajax())
        {
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
            })->where(function ($q) use ($job_id) {
                if ($job_id) {
                    $q->when($job_id, function ($q, $job_id) {
                        return $q->where('job_id', $job_id);
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
            })->paginate($countPerPage);
            $nannies = $nannies->unique('id');
            // $query = request()->query();
            // $text = http_build_query($query);
            // $total = $nannies->total();
            // dd($total);
            // $nannies = $nannies->items();
            // $currentPage = \Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPage();
            // $nannies = new \Illuminate\Pagination\LengthAwarePaginator($nannies, $total, 2, $currentPage);
            // return view('site.filter.filter', compact('items','skills','getSkills', 'text'));
            $view = view('site.components.card.cv', compact('nannies'))->render();
            return response()->json(['html' => $view]);
        } else {
            $find = Find::first();
            $nannies = Nanny::paginate($countPerPage);
            $n = Nanny::with('broker')->get();
            return view('site.filter.filter', compact('nannies','n','skills','find'));
        }


    }


}
