@extends('site.layout.index')
@section('page_js')
    @include('site.filter.scripts')
@stop
@section('content')

     <!-- start find -->
     <div class="find">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 text-white ml-2">
                    <p class="h2">{!! $find->title !!}</p>
                    <p>{!! $find->body !!}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- filter -->
    <div class="filter pt-5 pb-3">
        <div class="container">
            <div class="row">
                <!-- aside -->
                <div class="col-lg-3 aside">
                    <p class="h3 mb-4">Filter</p>
                    <form action="" method="get" id="filter">
                        <div class="chooseInfo">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-6 col-lg-12 filterSelect mb-3">
                                        <label class="ml-1 mb-0">Nationality</label>
                                        <select class="selectpicker" data-live-search="true" name="country_id">
                                            <option selected disabled >Choose Country</option>
                                            @foreach(\App\Model\Country::all() as $country)
                                                <option {{ request('country_id') == $country->id ? 'selected' : ''}} value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-6 col-lg-12 filterSelect mb-3">
                                        <label class="ml-1 mb-0">Job Title</label>
                                        <select class="selectpicker" name="job_id">
                                            <option selected disabled >Job Title</option>
                                            @foreach(\App\Model\Job::all() as $job)
                                                <option {{ request('job_id') == $job->id ? 'selected' : ''}} value="{{ $job->id }}">{{ $job->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-6 col-lg-12 filterSelect mb-3">
                                        <label class="ml-1 mb-0">Religion</label>
                                        <select class="selectpicker" name="religion">
                                            <option selected disabled >Religion</option>
                                            <option {{request('religion') == 'Muslim' ? 'selected' : ''}}>Muslim</option>
                                            <option {{request('religion') == 'Christian' ? 'selected' : ''}}>Christian</option>
                                            <option {{request('religion') == 'Any' ? 'selected' : ''}}>Any</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 col-lg-12 filterSelect mb-3">
                                        <label class="ml-1 mb-0">Marital Status</label>
                                        <select class="selectpicker" name="marital_status">
                                            <option selected disabled >Marital Status</option>
                                            <option {{request('marital_status') == 'Single' ? 'selected' : ''}}>Single</option>
                                            <option {{request('marital_status') == 'Married' ? 'selected' : ''}}>Married</option>
                                            <option {{request('marital_status') == 'Any' ? 'selected' : ''}}>Any</option>
                                        </select>
                                    </div>
                                    <div class="col-2 col-md-12"></div>
                                    <div class="col-10 col-md-12 filter mt-0">
                                        <div class="row">
                                            <div class="range-filter">
                                                <p style="font-weight:500" class="age mb-2">Age</p>
                                                <div id="slider-range"></div>
                                                <div class="mt-2 mb-4 myRangeFilter">
                                                    <input type="text" id="amount" class="col-8" readonly
                                                           style="border:0; font-weight:bold;">
                                                    <input type="hidden" id="min" name="min" value="">
                                                    <input type="hidden" id="max" name="max" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 filterSelect mb-1">
                                        {{--  <p class="mb-2">Skills</p>  --}}
                                        <div class="skills">

                                                <div class="row">


                                                      <div id="accordion" class="col-12 m-0">
                                                        <div class="card p-0">
                                                          <div class="card-header" id="headingOne" style="cursor: pointer;" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                            <h5 class="mb-0" style="font-size: 18px">
                                                                Show Skills
                                                            </h5>
                                                          </div>

                                                          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                                            <div class="card-body">
                                                                <?php $mySkills = request('skills') ? request('skills') : [] ; ?>
                                                                @foreach ($skills as $skill)
                                                                <div class="col-12 col-lg-12 custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="skills[]" id="{{ $skill->skill }}"
                                                                    {{ in_array( $skill->skill , $mySkills ) ? 'checked' : '' }}
                                                                    value="{{ $skill->skill }}">
                                                                    <label class="custom-control-label" for="{{ $skill->skill }}">{{ $skill->skill }}</label>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>


                                                </div>

                                        </div>
                                    </div>

                                </div>
                                <button class="btn btn-primary mb-3 ml-4 ml-lg-0 nannyFilter float-right float-lg-left">Filter</button>
                                <a href="{{ url()->current() }}" class="btn btn-info mb-3 ml-4 ml-lg-1">Reset</a>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- result search -->
                <div class="col-lg-9 resultSearch">
                    <div class="row">
                        {{--  <p class="text-muted ml-3">{{ $nannies->total() > 1 ? $nannies->total() . ' Results' : $nannies->total() . ' Result' }} ...</p>  --}}
                        <div class="col-12" id="nannyBody">
                            {{-- card --}}
                            @include('site.components.card.cv')
                            {{--  end card  --}}
                        </div>

                        <div class="col-md-12 spinner-main-div" id="spinner-main-div" style="display: none">
                            <div class="row">
                                <div class=" m-auto">
                                    <div class="text-center" style="margin-top: 150px">
                                        <div class="spinner-border" style="color: #ef7f65; width:100px; height:100px" role="status">
                                             <span class="sr-only">Loading...</span>
                                         </div>
                                   </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
