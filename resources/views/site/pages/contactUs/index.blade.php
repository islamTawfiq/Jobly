@extends('site.layout.index')
@section('content')
    <main>

        <!-- start contactUs -->
        <div class="contactUs">
            <div class="afterBack">
                <div class="countText">
                    <p>Contact Us</p>
                </div>
            </div>
        </div>

        <div class="connectWithUs">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1 mr-lg-5"></div>
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="needHelp text-center">
                            <div class="imgHelp mb-2">
                                <img src="{{url('design/site/images/help.png')}}" alt="help">
                            </div>
                            <p class="h5 mb-4">Need Help</p>
                            <form>
                                <input type="email" class="form-control" placeholder="Your email">
                                <textarea class="form-control" rows="5" placeholder="Your question"></textarea>
                                <button class="btn btn-primary sendEmail">Send Email</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-4">
                        <div class="callUs text-center">
                            <div class="imgCall mb-2">
                                <img src="{{url('design/site/images/call-answer.png')}}" alt="call us">
                            </div>
                            <p class="h5 mb-4">Call us at</p>
                            <p class="textCallUs">{!! $item->text !!}</p>
                            <p class="phoneCall">{!! $item->mobile !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        
    </main>
@stop
