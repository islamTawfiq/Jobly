@extends('site.layout.dashboard')
@section('content')
    <main>

        @include('site.components.dashboard.topMain', ['pageName' => 'New Message'])

        <div class="myOrder">
            <div class="container">
                <div class="row">
                    <div class="col-12" style="margin-bottom:90px; margin-top: 90px">

                        @if ($message->send->user_type_id != 1)
                        <div class="requestAnInterview text-center text-md-left" >
                            {{--  Sponsor And Import Agency  --}}
                            @if (auth()->user()->user_type_id == 3 || auth()->user()->user_type_id == 4 )
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
                                        <p>"{{ $message->message }}"</p>
                                        {{-- <span class="mb-0">Please upload her visa</span> --}}
                                        {{-- <a href="" class="btn btn-primary pt-0 pb-0 pr-2 pl-2">Click here</a> --}}
                                    </div>
                                    <div class="col-12 text-right">
                                        {{--  <p>
                                            <a class="deleteMessage" href="{{ url('/sponsor-dashboard/my-notification/') . '/' . $message->id }}"><i class="fas fa-trash-alt"></i></a>
                                        </p>  --}}
                                        <span style="font-size: 14px" class="float-right">{{ $message->created_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="col-12 m-2">

                                        @if (auth()->user()->user_type_id == 4 )
                                        <form method="POST" action="{{ url('/sponsor-dashboard/notes/') . '/' . $message->nanny_id . '/' . $message->workers->broker->id }}">
                                        @endif
                                        @if (auth()->user()->user_type_id == 3 )
                                        <form method="POST" action="{{ url('/import-agency-dashboard/notes/') . '/' . $message->nanny_id . '/' . $message->workers->broker->id }}">
                                        @endif
                                            @csrf
                                            <div class="field" id="searchform">
                                                <input type="text" id="searchterm" name="message" placeholder="notes" class="">
                                                <button type="submit" id="search" class="btn btn-primary">Reply <i class="far fa-paper-plane"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endif
                            {{--  Broker And Export Agency  --}}
                            @if (auth()->user()->user_type_id == 2 || auth()->user()->user_type_id == 5 )
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-2 col-lg-1 mr-lg-3">
                                        <img src="{{ url( 'storage/' . $message->workers->main_image) }}" class="mr-3" alt="african">
                                    </div>
                                    <div class="col-12 col-md-10 col-lg-9">
                                        <h6 class="mt-0">
                                            <strong>
                                            @if ( $message->recive->user_type_id == 4 )
                                                #{{ $message->recive->id }} (Sponsor)
                                            @elseif ( $message->recive->user_type_id == 3 )
                                                #{{ $message->recive->id }} (Agency)
                                            @endif
                                            </strong>
                                            who request the candidate
                                             <a class="candidate" href="{{ url('profile') . '/' . $message->workers->id }}">{{ $message->workers->name }}</a>
                                             as {{ $message->workers->job_name }} sent you this message...
                                        </h6>
                                        <p>"{{ $message->message }}"</p>
                                        {{-- <span class="mb-0">Please upload her visa</span> --}}
                                        {{-- <a href="" class="btn btn-primary pt-0 pb-0 pr-2 pl-2">Click here</a> --}}
                                    </div>
                                    <div class="col-12 text-right">
                                        {{--  <p>
                                            <a class="deleteMessage" href="{{ url('/sponsor-dashboard/my-notification/') . '/' . $message->id }}"><i class="fas fa-trash-alt"></i></a>
                                        </p>  --}}
                                        <span style="font-size: 14px" class="float-right">{{ $message->created_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="col-12 m-2">
                                        @if (auth()->user()->user_type_id == 2)
                                        <form method="POST" action="{{ url('/broker-dashboard/notes') . '/' . $message->nanny_id . '/' . $message->send->id }}">
                                        @endif
                                        @if (auth()->user()->user_type_id == 5)
                                        <form method="POST" action="{{ url('/export-agency-dashboard/notes') . '/' . $message->nanny_id . '/' . $message->send->id }}">
                                        @endif
                                            @csrf
                                            <div class="field" id="searchform">
                                                <input type="text" id="searchterm" name="message" placeholder="notes" class="">
                                                <button type="submit" id="search" class="btn btn-primary">Reply <i class="far fa-paper-plane"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        @endif

                        {{-- for Admin --}}
                        @if ($message->send->user_type_id == 1)
                        <div class="requestAnInterview text-center text-md-left">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <span class="font-weight-bold">System Sent you a message</span>
                                    </div>
                                    <div class="col-lg-6 text-lg-right">
                                        <span class="history">{{ $message->created_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="col-12">
                                        <p class="mt-2">{{ $message->message }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </main>
@stop
