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
                    <p class="h2">Find Your Nanny</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque molestias unde reiciendis
                        accusamus laudantium quas. Obcaecati deserunt a consectetur sint!</p>
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
                    <form action="{{url('/filter-nannies')}}" method="get">
                        <div class="chooseInfo">
                            <div class="container">
                                <div class="row">
                                    <div class="col-6 col-lg-12 filterSelect mb-3">
                                        <label class="ml-1 mb-0">Nationality</label>
                                        <select class="selectpicker" name="country_id">
                                            <option selected disabled >Choose Country</option>
                                            @foreach(\App\Model\Country::all() as $country)
                                                <option {{ request('religion') == $country->id ? 'selected' : ''}} value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{--  <div class="col-6 col-lg-12 filterSelect mb-3">
                                        <label class="ml-1 mb-0">Job Titlle</label>
                                        <select class="selectpicker">
                                            <option>Any</option>
                                            <option>Designer</option>
                                            <option>Developer</option>
                                        </select>
                                    </div>  --}}
                                    <div class="col-6 col-lg-12 filterSelect mb-3">
                                        <label class="ml-1 mb-0">Religion</label>
                                        <select class="selectpicker" name="religion">
                                            <option selected disabled >Religion</option>
                                            <option {{request('religion') == 'Muslim' ? 'selected' : ''}}>Muslim</option>
                                            <option {{request('religion') == 'Christian' ? 'selected' : ''}}>Christian</option>
                                        </select>
                                    </div>
                                    {{--  <div class="col-6 col-lg-12 filterSelect mb-3">
                                        <label class="ml-1 mb-0">Education</label>
                                        <select class="selectpicker">
                                            <option>Any</option>
                                            <option>Test</option>
                                        </select>
                                    </div>  --}}
                                    <div class="col-6 col-lg-12 filterSelect mb-3">
                                        <label class="ml-1 mb-0">Marital Status</label>
                                        <select class="selectpicker" name="marital_status">
                                            <option selected disabled >Marital Status</option>
                                            <option {{request('marital_status') == 'Single' ? 'selected' : ''}}>Single</option>
                                            <option {{request('marital_status') == 'Married' ? 'selected' : ''}}>Married</option>
                                        </select>
                                    </div>

                                    <div class="col-6 col-lg-12 filter mt-4">
                                        <div class="row">
                                            <div class="range-filter">
                                                <p style="font-weight:500">Age</p>
                                                <div id="slider-range"></div>
                                                <div class="mt-3 mb-3" style="font-size:14px">
                                                    <input type="text" id="amount" class="col-8" readonly
                                                           style="border:0; font-weight:bold;">
                                                    <input type="hidden" id="min" name="min" value="">
                                                    <input type="hidden" id="max" name="max" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-12 filterSelect mb-3 ml-1">
                                        <p class="mb-2">Skills</p>
                                        <div class="skills">
                                            <div class="container">
                                                <div class="row">
                                                    {{--  {{ request(skills) }}  --}}
                                                    <?php $mySkills = request('skills') ? request('skills') : [] ; ?>
                                                    @foreach ($skills as $skill)
                                                    <div class="col-4 col-lg-12 custom-control custom-checkbox">
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
                                <button class="btn btn-primary mb-3 ml-4 ml-lg-0">Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- result search -->
                <div class="col-lg-9 resultSearch">
                    <div class="row">
                        <p class="text-muted ml-3">{{ count($nannies) > 1 ? count($nannies) . ' Results' : count($nannies) . ' Result' }} ...</p>
                        <div class="col-12">
                            {{-- card --}}
                            @include('site.components.card.cv')

                            {{--  end card  --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
