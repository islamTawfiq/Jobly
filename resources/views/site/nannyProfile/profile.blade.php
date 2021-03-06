@extends('site.layout.index')
@section('page_js')

<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f44108ab9b91ecf">
</script>

@include('site.nannyProfile.scripts')

@stop
@section('content')

<div class="profile">
    @auth
    @foreach ($reservation as $item)
    @if ( $item->status == 1 || $item->status == 4 )
    <div class="progress">
        <p>in progress</p>
    </div>
    @endif
    @endforeach
    @endauth
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-lg-9">
                <div class="profileInfo text-center text-md-left">
                    <p class="h2 mb-2 text-white">{{$nanny->name}}</p>
                    <div class="text-white mb-2">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>{{$nanny->country_name}}</span>

                        @include('site.components.buttons.book', [
                            'class' => 'btnBook float-md-right d-block m-2 ml-4 mr-4 m-md-0',
                            'reserved' => 'btnBook float-md-right d-block m-2 ml-4 mr-4 m-md-0',
                            ])


                        <!-- Modal -->
                        <div class="modal fade" id="bookNanny" tabindex="-1" role="dialog" aria-labelledby="bookNannyTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title requestInterview" id="bookNannyLongTitle">Request an interview</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('/reservation/' . $nanny->id .'/'. $nanny->broker_id) }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p class="text-left mb-0">Date</p>
                                                    <input type="date" class="form-control" name="date">
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="text-left mb-0">Time</p>
                                                    <input type="time" class="form-control" name="time">
                                                </div>
                                            </div>
                                            <hr class="mt-4">
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @auth
                        @if ( auth()->user()->user_type_id != 2 and auth()->user()->user_type_id != 5 )

                        <span class="watchlist">
                            <button
                            data-nanny-id="{{ $nanny->id }}"
                            data-like="@if( isset($likes->like_status) )
                            {{ $likes->like_status }}
                            @endif"
                            class="listing-favorite-icon myLike
                            @if( isset($likes->like_status) )
                            {{ $likes->like_status }}
                            @endif">
                                <i class="fas fa-star"></i>
                                Favourit
                            </button>
                        </span>
                        {{--  <span class="watchlist">
                            <a href="#" class="listing-exclamation-icon text-white">
                                <i class="fas fa-share-square"></i> Share
                            </a>
                        </span>  --}}
                        <span class="watchlist">
                            <a href="{{ url('/download/') . '/' . $nanny->id }}" class="listing-exclamation-icon text-white">
                                <i class="fas fa-cloud-download-alt"></i> Download CV
                            </a>
                        </span>
                        @endif
                    @endauth
                    @guest
                    <span class="watchlist ">
                        <a href="{{ url('/login') }}" class="listing-favorite-icon text-white">
                            <i class="fas fa-star"></i>
                            Favourit
                        </a>
                    </span>
                    {{--  <span class="watchlist">
                        <a href="{{ url('/login') }}" class="listing-exclamation-icon text-white">
                            <i class="fas fa-share-square"></i> Share
                        </a>
                    </span>  --}}
                    <span class="watchlist">
                        <a href="{{ url('/login') }}" class="listing-exclamation-icon text-white">
                            <i class="fas fa-cloud-download-alt"></i> Download CV
                        </a>
                    </span>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>

<!-- profileDetailes -->
<div class="profileDetailes">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="person">
                    <div class="profilPhoto">
                        <a class="openMainImage" href="{{ url( 'storage/' . $nanny->main_image) }}">
                            <img src="{{ url( 'storage/' . $nanny->main_image) }}" alt="profile photo">
                        </a>

                        @include('site.components.buttons.book', [
                            'class' => 'mt-3 ml-1 customBook',
                            'reserved' => 'mt-3 ml-1 customBook',
                            ])

                    </div>
                    <div class="personDetailes">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 personData">
                                    <div class="row">
                                        <div class="col-6">
                                            <span>Age:</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="spanDetailes">{{$nanny->age}} Years</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 personData">
                                    <div class="row">
                                        <div class="col-6">
                                            <span>Weight</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="spanDetailes">{{$nanny->weight}} Kg</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 personData">
                                    <div class="row">
                                        <div class="col-6">
                                            <span>Height</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="spanDetailes">{{$nanny->height}} Cm</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 personData">
                                    <div class="row">
                                        <div class="col-6">
                                            <span>Religion</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="spanDetailes">{{$nanny->religion}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 personData">
                                    <div class="row">
                                        <div class="col-6">
                                            <span>Marital Status</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="spanDetailes">{{$nanny->marital_status}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 personData">
                                    <div class="row">
                                        <div class="col-6">
                                            <span>Children</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="spanDetailes">{{$nanny->children}}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 personData">
                                    <div class="row">
                                        <div class="col-6">
                                            <span>Education</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="spanDetailes">{{$nanny->education}}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 personData">
                                    <div class="row">
                                        <div class="col-6">
                                            <span>Job</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="spanDetailes">{{$nanny->job_name}}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 personData">
                                    <div class="row">
                                        <div class="col-6">
                                            <span>Salary</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="spanDetailes">$ {{$nanny->salary}}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 personData">
                                    <div class="row">
                                        <div class="col-12 mb-1">
                                            <span>Experience</span>
                                        </div>
                                        @if ($nanny->noneExperience == 1)
                                        <div class="col-6 text-center">
                                            <span class="font-weight-bold">None</span>
                                        </div>
                                        @endif
                                        @if ($nanny->country_ex1 && $nanny->experience1)
                                        <div class="col-6 text-center">
                                            <span class="font-weight-bold">{{ $nanny->country_ex1 }}</span>
                                        </div>
                                        <div class="col-6 text-center">
                                            <span class="spanDetailes">{{$nanny->experience1}}
                                                @if ($nanny->experience1 > 1)
                                                    Years
                                                @else
                                                    Year
                                                @endif
                                            </span>
                                        </div>
                                        @endif
                                        @if ($nanny->country_ex2 && $nanny->experience2)
                                        <div class="col-6 text-center">
                                            <span class="font-weight-bold">{{ $nanny->country_ex2 }}</span>
                                        </div>
                                        <div class="col-6 text-center">
                                            <span class="spanDetailes">{{$nanny->experience2}}
                                                @if ($nanny->experience2 > 1)
                                                    Years
                                                @else
                                                    Year
                                                @endif
                                            </span>
                                        </div>
                                        @endif
                                        @if ($nanny->country_ex3 && $nanny->experience3)
                                        <div class="col-6 text-center">
                                            <span class="font-weight-bold">{{ $nanny->country_ex3 }}</span>
                                        </div>
                                        <div class="col-6 text-center">
                                            <span class="spanDetailes">{{$nanny->experience3}}
                                                @if ($nanny->experience3 > 1)
                                                    Years
                                                @else
                                                    Year
                                                @endif
                                            </span>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-12 personData">
                                    <div class="row">
                                        <div class="col-12 mb-1">
                                            <span>Languages</span>
                                        </div>
                                        <div class="col-6 text-center">
                                            <span class="font-weight-bold">Arabic</span>
                                        </div>
                                        <div class="col-6 text-center">
                                            <span class="spanDetailes">{{$nanny->arabic_lang}}</span>
                                        </div>
                                        <div class="col-6 text-center">
                                            <span class="font-weight-bold">English</span>
                                        </div>
                                        <div class="col-6 text-center">
                                            <span class="spanDetailes">{{$nanny->english_lang}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @include('site.components.buttons.book', [
                    'class' => 'mt-3 ml-1 d-none d-md-block',
                    'reserved' => 'mt-3 ml-1 d-none d-md-block',
                    ])

            </div>
            <div class="col-md-9">
                <ul class="nav nav-pills mb-3 p-2" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-about-tab" data-toggle="pill" href="#pills-about"
                            role="tab" aria-controls="pills-about" aria-selected="true">About Me</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-gallery-tab" data-toggle="pill" href="#pills-gallery"
                            role="tab" aria-controls="pills-gallery" aria-selected="false">Gallery</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-about" role="tabpanel"
                        aria-labelledby="pills-about-tab">
                        <div class="aboutMe">
                            <doiv class="container">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <div class="aboutMeDetailes">
                                            <p style="font-weight: bold" class="btn btn-primary float-right">Sourcing Fees
                                                 <span style="color: #000"> ( $ {{ $nanny->fees }} )</span>
                                            </p>
                                            <p class="h4">Who I am</p>
                                            <p>{{$nanny->about}}</p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="keySkills">
                                            <p class="h4">key skills & competencies</p>
                                            <div class="mb-2 d-inline-block">
                                                @foreach ($skills as $skill)
                                                    <div class="mb-2 d-inline-block">
                                                        <span>{{$skill}}</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </doiv>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-gallery" role="tabpanel"
                        aria-labelledby="pills-gallery-tab">
                        <div class="gallery">
                            <div class="container">
                                <div class="row">
                                    @if ($nanny->gallery != null)
                                    @foreach ($images as $image)
                                        <div class="col-6 col-lg-3">
                                            <a class="openImage" href="{{ url( '/gallery/' . $image) }}">
                                                <img src="{{ url( '/gallery/' . $image) }}" alt="images">
                                            </a>
                                        </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12 text-center mt-3 mb-0 d-md-none">
                @include('site.components.buttons.book', [
                    'class' => '',
                    'reserved' => '',
                    ])
            </div>
        </div>
    </div>
</div>

<!-- more nannies -->
<div class="moreNannies text-center">
    @if ($randomNannies->count() >= 3)
    <p class="h3 mb-2 mt-2 mb-lg-3 font-weight-bold">More Candidates</p>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    @foreach ($randomNannies as $randomNanny)
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="row">
                                <div class="col-5 imageCard">
                                    <a href="{{ $randomNanny->id }}">
                                        <img src="{{ url('storage/' . $randomNanny->main_image) }}" alt="">
                                    </a>
                                </div>
                                <div class="col-7 cardDetail">
                                    <a href="{{ $randomNanny->id }}">
                                        <p class="h5 mb-0">{{ $randomNanny->name }}</p>
                                    </a>
                                    <p class="text-muted m-0">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span>{{$nanny->country_name}}</span>
                                    </p>
                                    <table>
                                        <tr>
                                            <td>Job:</td>
                                            <td>{{$nanny->job_name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Age:</td>
                                            <td>{{ $randomNanny->age }} Years</td>
                                        </tr>
                                        <tr>
                                            <td>Experience:</td>
                                            <?php $experience = $randomNanny->experience1 + $randomNanny->experience2 + $randomNanny->experience3 ?>
                                            <td>
                                                @if ($experience > 1)
                                                    {{ $experience }} Years
                                                @elseif($experience == 1)
                                                    {{ $experience }} Year
                                                @else
                                                      None
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Salary:</td>
                                            <td>{{ $randomNanny->salary }} $</td>
                                        </tr>
                                    </table>
                                    <a href="{{ $randomNanny->id }}" class="btn btn-primary mt-1">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

@stop


