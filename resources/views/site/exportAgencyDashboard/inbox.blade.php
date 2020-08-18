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
                    <div class="col-12" @if ($messages->count() == 1) {{ 'style=margin-bottom:100px' }} @endif >
                        <div class="requestAnInterview text-center text-md-left">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-2 col-lg-1 mr-lg-3">
                                        <img src="{{ url( 'storage/' . $message->workers->main_image) }}" class="mr-3" alt="african">
                                    </div>
                                    <div class="col-12 col-md-10 col-lg-9">
                                        <h6 class="mt-0">
                                            <strong>
                                            @if ( $message->send->user_type_id == 4 )
                                                #{{ $message->send->id }} (Sponsor)
                                            @elseif ( $message->send->user_type_id == 3 )
                                                #{{ $message->send->id }} (Agency)
                                            @endif
                                            </strong>
                                            The sponsor who request the candidate
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
                                        <form method="POST" action="{{ url('/export-agency-dashboard/notes') . '/' . $message->nanny_id . '/' . $message->send->id }}">
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
                </div>
            </div>
        </div>


    </main>
@stop
