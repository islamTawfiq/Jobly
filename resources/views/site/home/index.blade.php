@extends('site.layout.index')
@section('content')
    <main>
        <!-- letsStart -->
        @guest
        <div class="letStart text-center">
            {{--  <div class="imgAbs">
                <img src="{{url('design/site/images/abs.png')}}" alt="abs">
            </div>  --}}
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p class="h4 mb-4">Start Now</p>
                    </div>
                    <div class="col-md-4">
                        <div class="toStart">
                            <p class="h5">{{ $start->family }}</p>
                            <div class="infoStart">
                                <i class="fas fa-check"></i>
                                <span>{{ $start->family_instruction1 }}</span>
                            </div>
                            <div class="infoStart">
                                <i class="fas fa-check"></i>
                                <span>{{ $start->family_instruction2 }}</span>
                            </div>
                            <div class="infoStart">
                                <i class="fas fa-check"></i>
                                <span>{{ $start->family_instruction3 }}</span>
                            </div>
                            <div class="signStart">
                                <a href="{{ url('/sponsor-register') }}" class="btn btn-primary">Sign In</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="toStart">
                            <p class="h5">{{ $start->sourcing }}</p>
                            <div class="infoStart">
                                <i class="fas fa-check"></i>
                                <span>{{ $start->sourcing_instruction1 }}</span>
                            </div>
                            <div class="infoStart">
                                <i class="fas fa-check"></i>
                                <span>{{ $start->sourcing_instruction2 }}</span>
                            </div>
                            <div class="infoStart">
                                <i class="fas fa-check"></i>
                                <span>{{ $start->sourcing_instruction3 }}</span>
                            </div>
                            <div class="signStart">
                                <a href="{{ url('/export-agency-register') }}" class="btn btn-primary">Sign In</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="toStart">
                            <p class="h5">{{ $start->agent }}</p>
                            <div class="infoStart">
                                <i class="fas fa-check"></i>
                                <span>{{ $start->agent_instruction1 }}</span>
                            </div>
                            <div class="infoStart">
                                <i class="fas fa-check"></i>
                                <span>{{ $start->agent_instruction2 }}</span>
                            </div>
                            <div class="infoStart">
                                <i class="fas fa-check"></i>
                                <span>{{ $start->agent_instruction3 }}</span>
                            </div>
                            <div class="signStart">
                                <a href="{{ url('/broker-register') }}" class="btn btn-primary">Sign In</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endguest

        <!-- start whoWeAre -->
        <div class="whoWeAre">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="slideWho">
                            <ul class="vertical">
                                <li data-thumb="{{ $about->first_image }}">
                                    <img src="{{ $about->first_image }}" />
                                </li>
                                <li data-thumb="{{ $about->second_image }}">
                                    <img src="{{ $about->second_image }}" />
                                </li>
                                <li data-thumb="{{ $about->third_image }}">
                                    <img src="{{ $about->third_image }}" />
                                </li>
                                <li data-thumb="{{ $about->fourth_image }}">
                                    <img src="{{ $about->fourth_image }}" />
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="textWhoWeAre">

                            <p class="h4">{!! $about->title !!}</p>
                            <p class="text-muted">
                                {!! Str::limit( $about->body , 480) !!}
                                @if ( strlen( $about->body ) > 480 )
                                 <a href="{{ url('/about-us') }}" class="btn btn-primary">More</a>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- start countNannyProfile -->
        <div class="countNannyProfile">
            <div class="afterBack">
                <div class="countText">
                    <p>+ {{ count($nannies) }} Domestic Workers Profile</p>
                </div>
            </div>
        </div>

        <!-- ourCustomer -->
        <div class="ourCustomer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="textWhoWeAre">
                            <p class="h4">What Our Customers Says</p>
                            <p class="text-muted">We receive many messages of admiration and appreciation for the way the site works.</p>
                            <p class="text-muted">Your opinion matters to us at info@joobly.net</p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="customerSlider">
                            <div id="myCustomerSlider" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#myCustomerSlider" data-slide-to="0" class="active"><img
                                            src="{{url('design/site/images/africa8.jpeg')}}" alt="slide"></li>
                                    <li data-target="#myCustomerSlider" data-slide-to="1">
                                        <img src="{{url('design/site/images/africa6.jpeg')}}" alt="slide2">
                                        <div>
                                            <p>Islam</p>
                                            <span>Developer</span>
                                        </div>
                                    </li>
                                    <li data-target="#myCustomerSlider" data-slide-to="2"><img src="{{url('design/site/images/africa4.jpeg')}}"
                                            alt="slide3"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <p>"Joobly website is very supportive throughout the entire recruitment process, it is behind every step of the way knows the knowledgeable about the domestic workers hiring and the interview process."</p>
                                    </div>
                                    <div class="carousel-item">
                                        <p>"The shortlist of CV’s that Joobly supplied indicated a good understanding of the brief. I  always accessible during the process, we found a good candidate quickly and based on our experience with Joobly, would work with her again"</p>
                                    </div>
                                    <div class="carousel-item">
                                        <p>"It was a good experience working with this website it consistent in hiring process and the communication was very smooth. I learned easy how to book my desire domestic workers.Joobly working professional."</p>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#myCustomerSlider" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#myCustomerSlider" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop
