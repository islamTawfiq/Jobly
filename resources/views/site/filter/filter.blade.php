@extends('site.layout.index')
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
                    <form>
                        <div class="chooseInfo">
                            <div class="container">
                                <div class="row">
                                    <div class="col-6 col-lg-12 filterSelect mb-3">
                                        <label class="ml-1 mb-0">Nationality</label>
                                        <select class="selectpicker">
                                            <option>South Africa</option>
                                            <option>Cameron</option>
                                            <option>Kenyan</option>
                                        </select>
                                    </div>
                                    <div class="col-6 col-lg-12 filterSelect mb-3">
                                        <label class="ml-1 mb-0">Job Titlle</label>
                                        <select class="selectpicker">
                                            <option>Any</option>
                                            <option>Designer</option>
                                            <option>Developer</option>
                                        </select>
                                    </div>
                                    <div class="col-6 col-lg-12 filterSelect mb-3">
                                        <label class="ml-1 mb-0">Age</label>
                                        <select class="selectpicker">
                                            <option>Any</option>
                                            <option>22</option>
                                            <option>50</option>
                                        </select>
                                    </div>
                                    <div class="col-6 col-lg-12 filterSelect mb-3">
                                        <label class="ml-1 mb-0">Religion</label>
                                        <select class="selectpicker">
                                            <option>Muslim</option>
                                            <option>Christian</option>
                                        </select>
                                    </div>
                                    <div class="col-6 col-lg-12 filterSelect mb-3">
                                        <label class="ml-1 mb-0">Education</label>
                                        <select class="selectpicker">
                                            <option>Any</option>
                                            <option>Test</option>
                                        </select>
                                    </div>
                                    <div class="col-6 col-lg-12 filterSelect mb-3">
                                        <label class="ml-1 mb-0">Materital Status</label>
                                        <select class="selectpicker">
                                            <option>Single</option>
                                            <option>Married</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-12 filterSelect mb-3 ml-1">
                                        <p class="mb-2">Skills</p>
                                        <div class="skills">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-4 col-lg-12 custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="english"
                                                            name="english">
                                                        <label class="custom-control-label" for="english">English
                                                            Language</label>
                                                    </div>
                                                    <div class="col-4 col-lg-12 custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="arabic"
                                                            name="arabic">
                                                        <label class="custom-control-label" for="arabic">Arabic
                                                            Language</label>
                                                    </div>
                                                    <div class="col-4 col-lg-12 custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="driving"
                                                            name="driving">
                                                        <label class="custom-control-label"
                                                            for="driving">Driving</label>
                                                    </div>
                                                    <div class="col-4 col-lg-12 custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="cooking"
                                                            name="cooking">
                                                        <label class="custom-control-label"
                                                            for="cooking">Cooking</label>
                                                    </div>
                                                    <div class="col-4 col-lg-12 custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="arCooking" name="arCooking">
                                                        <label class="custom-control-label" for="arCooking">Arabian
                                                            Cooking</label>
                                                    </div>
                                                    <div class="col-4 col-lg-12 custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="babyCare" name="babyCare">
                                                        <label class="custom-control-label" for="babyCare">Baby
                                                            Care</label>
                                                    </div>
                                                    <div class="col-4 col-lg-12 custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="tutoring" name="tutoring">
                                                        <label class="custom-control-label"
                                                            for="tutoring">Tutoring</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary mb-3 ml-4 ml-lg-0">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- result search -->
                <div class="col-lg-9 resultSearch">
                    <div class="row">
                        <p class="text-muted ml-3">4 Results...</p>
                        <div class="col-12">
                            {{-- card --}}
                            @foreach ($nannies as $nanny)

                                <div class="card">
                                    <div class="row">
                                        <div class="col-4 col-sm-5 col-lg-4 imgCard">
                                            <a href="{{url( '/profile/' . $nanny->id )}}">
                                                <img src="{{ url( 'storage/' . $nanny->main_image) }}" alt="">
                                            </a>
                                        </div>
                                        <div class="col-8 col-sm-7 col-lg-4 cardDetail">
                                            <a href="{{url( '/profile/' . $nanny->id )}}">
                                                <p class="h3 mb-0">{{$nanny->name}}</p>
                                            </a>
                                            <p class="text-muted m-0">
                                                <i class="fas fa-map-marker-alt"></i>
                                                <span>{{$nanny->country}}</span>
                                            </p>
                                            <table>
                                                <tr>
                                                    <td>Job:</td>
                                                    <td>{{$nanny->job}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Age:</td>
                                                    <td>{{$nanny->age}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Experience:</td>
                                                    <td>{{$nanny->experience}}</td>
                                                </tr>
                                                {{--  <tr>
                                                    <td>Languages:</td>
                                                    <td>English, Arabic</td>
                                                </tr>  --}}
                                                <tr>
                                                    <td>Salary:</td>
                                                    <td>{{ $nanny->salary }} QAR</td>
                                                </tr>
                                            </table>
                                            <a href="{{url( '/profile/' . $nanny->id )}}" class="btn btn-primary mt-1">Details</a>
                                        </div>
                                        <div class="col-12 col-lg-4 whoIam pt-3">
                                            <p class="h4">Who I am</p>
                                            <p>
                                                {{ Str::limit($nanny->about, 120) }}
                                                @if ( strlen($nanny->about) > 120 )
                                                    <a href="#">Read More</a>
                                                @endif
                                            </p>

                                        </div>
                                    </div>
                                </div>

                            @endforeach
                            {{-- end card --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
