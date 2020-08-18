@extends('site.layout.dashboard')
@section('content')
    <main>

        @include('site.components.dashboard.topMain', ['pageName' => 'My Notification'])

        <div class="myNotifications">
            <div class="container">
                <div class="row">
                    @if ($messages->count() == 0)
                    <div class="col-12">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="noCvs col-12 col-md-8 mt-3 mb-5">
                                <img src="{{url('design/site/images/no.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                    @endif
                    @foreach ($messages as $message)
                    <div class="col-12" @if ($messages->count() == 1) {{ 'style=margin-bottom:100px' }} @endif>
                        <div class="requestAnInterview text-center text-md-left">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-2 col-lg-1 mr-lg-3">
                                        <img src="{{ url( 'storage/' . $message->workers->main_image) }}" class="mr-3" alt="african">
                                    </div>
                                    <div class="col-12 col-md-10 col-lg-9">
                                        <h6 class="mt-0">
                                            <strong>
                                                @if ( $message->send->user_type_id == 2 )
                                                   #{{ $message->send->id }} (Broker)
                                                @elseif ( $message->send->user_type_id == 5 )
                                                   #{{ $message->send->id }} (Agency)
                                                @endif
                                            </strong>
                                             Responsible for the candidate
                                             <a class="candidate" href="{{ url('profile') . '/' . $message->workers->id }}">{{ $message->workers->name }}</a>
                                             as {{ $message->workers->job_name }} sent you this message...
                                        </h6>
                                        <p>{{ $message->message }}</p>
                                        {{-- <span class="mb-0">Please upload her visa</span> --}}
                                        {{-- <a href="" class="btn btn-primary pt-0 pb-0 pr-2 pl-2">Click here</a> --}}
                                    </div>
                                    <div class="col-12 text-right">
                                        <p>
                                            <a class="deleteMessage" href="{{ url()->current() . '/' . $message->id }}"><i class="fas fa-trash-alt"></i></a>
                                        </p>
                                        <span style="font-size: 14px" class="float-right">{{ $message->created_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="col-12 m-2">
                                        <form method="POST" action="{{ url('/import-agency-dashboard/notes/') . '/' . $message->nanny_id . '/' . $message->send->id }}">
                                            @csrf
                                            <div class="field" id="searchform">
                                                <input type="text" id="searchterm" name="message" placeholder="notes" class="">
                                                <button type="submit" id="search" class="btn btn-primary">Reply <i class="far fa-paper-plane"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="col-12">
                        <div class="requestAnInterview text-center text-md-left">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-2 col-lg-1 mr-lg-3">
                                        <img src="images/africa1.jpeg" class="mr-3" alt="african">
                                    </div>
                                    <div class="col-12 col-md-10 col-lg-9">
                                        <h5 class="mt-0"><strong>Michele Davied</strong> Passport has been finished</h5>
                                        <p>December 18th, 2019 - 12:00 PM</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-12">
                        <div class="requestAnInterview text-center text-md-left">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-2 col-lg-1 mr-lg-3">
                                        <img src="images/africa1.jpeg" class="mr-3" alt="african">
                                    </div>
                                    <div class="col-12 col-md-10 col-lg-9">
                                        <h5 class="mt-0">Your booked and confirmed the candidate <strong>Michele
                                                Davied.</strong> as housekeeper</h5>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry’s standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type and scrambled it to
                                            make a type specimen book. It has survived not only five centuries, but also
                                            the leap into electronic typesetting, remaining essentially unchanged. It
                                            was popularised in the 1960s with the release of Letraset sheets containing
                                            Lorem Ipsum passages, and more recently with desktop publishing software
                                            like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                    </div>
                                </div>
                            </div>
                            <form class="mt-2">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" placeholder="Your Message">
                                        </div>
                                        <div class="col-lg-3 col-12 text-right">
                                            <button type="submit" class="btn btn-primary">Send Message</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>


    </main>
@stop
