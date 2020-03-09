@extends('site.layout.index')
@section('content')
    <main>

        {{-- @include('site.layout.navbars.homeNav') --}}

        <!-- letsStart -->
        <div class="letStart text-center">
            <div class="imgAbs">
                <img src="{{url('design/site/images/abs.png')}}" alt="abs">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p class="h4">Let's Start Now</p>
                        <p class="pCont">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <div class="toStart">
                            <p class="h5">I am a Sponsor <br> I want to hire a nanny</p>
                            <div class="infoStart">
                                <i class="fas fa-check"></i>
                                <span>Lorem ipsum dolor sit amet.</span>
                            </div>
                            <div class="infoStart">
                                <i class="fas fa-check"></i>
                                <span>Lorem ipsum dolor sit amet.</span>
                            </div>
                            <div class="infoStart">
                                <i class="fas fa-check"></i>
                                <span>Lorem ipsum dolor sit amet.</span>
                            </div>
                            <div class="signStart">
                                <a href="sponsorRegistration.html" class="btn btn-primary">Sign In</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="toStart">
                            <p class="h5">We are agency <br> We want to join now</p>
                            <div class="infoStart">
                                <i class="fas fa-check"></i>
                                <span>Lorem ipsum dolor sit amet.</span>
                            </div>
                            <div class="infoStart">
                                <i class="fas fa-check"></i>
                                <span>Lorem ipsum dolor sit amet.</span>
                            </div>
                            <div class="infoStart">
                                <i class="fas fa-check"></i>
                                <span>Lorem ipsum dolor sit amet.</span>
                            </div>
                            <div class="signStart">
                                <a href="agencyRegistration.html" class="btn btn-primary">Sign In</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- start countNannyProfile -->
        <div class="countNannyProfile">
            <div class="afterBack">
                <div class="countText">
                    <p>+ 765 Nanny Profile</p>
                </div>
            </div>
        </div>

        <!-- start whoWeAre -->
        <div class="whoWeAre">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="slideWho">
                            <ul class="vertical">
                                <li data-thumb="{{url('design/site/images/slide1.png')}}">
                                    <img src="{{url('design/site/images/slide1.png')}}" />
                                </li>
                                <li data-thumb="{{url('design/site/images/slide2.png')}}">
                                    <img src="{{url('design/site/images/slide2.png')}}" />
                                </li>
                                <li data-thumb="{{url('design/site/images/slide3.png')}}">
                                    <img src="{{url('design/site/images/slide3.png')}}" />
                                </li>
                                <li data-thumb="{{url('design/site/images/slide2.png')}}">
                                    <img src="{{url('design/site/images/slide2.png')}}" />
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="textWhoWeAre">
                            <p class="h4">Who We Are</p>
                            <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt neque
                                adipisci nulla quasi dolore fugit velit officiis, quia culpa possimus.</p>
                            <a href="about.html" class="btn btn-primary">More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <!-- ourCustomer -->
        <div class="ourCustomer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="textWhoWeAre">
                            <p class="h4">What Our Customers Says</p>
                            <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt neque
                                adipisci nulla quasi dolore fugit velit officiis, quia culpa possimus.</p>
                            <a href="" class="btn btn-primary">More</a>
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
                                        <p>"It has survived not only five centuries, but also the leap into electronic
                                            typesetting, remaining essentially unchanged. It was popularised in the 1960s
                                            with the release of set sheets containing"</p>
                                    </div>
                                    <div class="carousel-item">
                                        <p>"It has survived not only five centuries, but also the leap into electronic
                                            typesetting, remaining essentially unchanged. It was popularised in the 1960s
                                            with the release of set sheets containing"</p>
                                    </div>
                                    <div class="carousel-item">
                                        <p>"It has survived not only five centuries, but also the leap into electronic
                                            typesetting, remaining essentially unchanged. It was popularised in the 1960s
                                            with the release of set sheets containing"</p>
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
