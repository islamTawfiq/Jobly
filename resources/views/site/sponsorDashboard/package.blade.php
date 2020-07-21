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
                                    <p class="h5">$ 36 One Month</p>
                                    <div class="infoStart">
                                        <i class="fas fa-check"></i>
                                        <span>Interview 12 Nannies</span>
                                    </div>
                                    <div class="signStart mt-md-5">
                                        <a href="JavaScript:void(0);" class="btn btn-primary selected">Selected</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 text-center">
                                <div class="toStart">
                                    <p class="h5">$ 300 One Year</p>
                                    <div class="infoStart">
                                        <i class="fas fa-check"></i>
                                        <span>Unlimited Interviews</span>
                                        <p class="mt-2 font-weight-bold">Online Support <br> Refunding any time</p>
                                    </div>
                                    <div class="signStart">
                                        <a href="" class="btn btn-primary">Upgrade</a>
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
