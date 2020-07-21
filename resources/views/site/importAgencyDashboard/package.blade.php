@extends('site.layout.dashboard')
@section('content')
    <main>

        @include('site.components.dashboard.topMain', ['pageName' => 'My Package'])

        <!-- myPackage -->
        <div class="myPackage mb-5 mt-5">
            <div class="container">
                <div class="row">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-lg-4 text-center mb-4 mb-md-0">
                                <div class="toStart packageSelected">
                                    <p class="h5">$ 150 One Month</p>
                                    <div class="infoStart">
                                        <i class="fas fa-check"></i>
                                        <span>Unlimited booking</span>
                                    </div>
                                    <div class="signStart mt-md-5">
                                        <a href="JavaScript:void(0);" class="btn btn-primary selected">Selected</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@stop
