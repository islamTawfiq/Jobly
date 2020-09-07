@extends('site.layout.dashboard')
@section('content')
    <main>

        @include('site.components.dashboard.topMain', ['pageName' => 'New Notification'])

        <div class="myOrder">
            <div class="container">
                <div class="row">
                    <div class="col-12" style="margin-bottom:90px; margin-top: 90px">
                        <div class="requestAnInterview text-center text-md-left">
                            {{--  Sponsor And Import Agency  --}}
                            @if (auth()->user()->user_type_id == 3 || auth()->user()->user_type_id == 4 )
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-2 col-lg-1 mr-lg-3">
                                        <img src="{{ url( 'storage/' . $nanny->workers->main_image) }}" class="mr-3" alt="african">
                                    </div>
                                    <div class="col-12 col-md-10 col-lg-9">
                                        <h5 class="mt-0">You are request an interview with
                                            <span>
                                                <a class="orderedNanny" href="{{ url('profile') . '/' . $nanny->workers->id }}">{{ $nanny->workers->name }}</a>
                                            </span>
                                            from
                                            <strong>
                                            @if ( $nanny->workers->broker->user_type_id == 2 )
                                               #{{ $nanny->workers->broker->id }} (Agent)
                                            @elseif ( $nanny->workers->broker->user_type_id == 5 )
                                               #{{ $nanny->workers->broker->id }} (Agency)
                                            @endif
                                            </strong>
                                        </h5>
                                        <p class="mb-0">
                                            Interview date & time:
                                            <span>{{ $nanny->date }} - {{ \Carbon\Carbon::createFromFormat('H:i:s',$nanny->time)->format('g:i a') }}</span>
                                        </p>
                                        <div class="font-weight-bold">
                                            @if ($nanny->status == 1)
                                                <p class="text-warning">pending for approval</p>
                                            @elseif ($nanny->status == 2)
                                                <p class="text-danger">You canceled the request</p>
                                            @elseif ($nanny->status == 3)
                                                <p class="text-danger">We are sorry we can not arrange the interview , please select anther candidate</p>
                                            @elseif ($nanny->status == 4)
                                                <p class="text-info">The interview approved</p>
                                            @elseif ($nanny->status == 5)
                                                <p class="text-danger">You rejected the candidate</p>
                                            @elseif ($nanny->status == 6)
                                                <p class="text-success">Hired</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12 text-md-right rightButtons">
                                        @if ($nanny->status == 1)
                                            @if (auth()->user()->user_type_id == 4)
                                            <a href="{{ url('/sponsor-dashboard/cancel/') . '/' . $nanny->id }}" class="btn btn-danger btnDashboard">Cancel</a>
                                            @endif
                                            @if (auth()->user()->user_type_id == 3)
                                            <a href="{{ url('/import-agency-dashboard/cancel/') . '/' . $nanny->id }}" class="btn btn-danger btnDashboard">Cancel</a>
                                            @endif
                                        @elseif ($nanny->status == 2 || $nanny->status == 3 || $nanny->status == 5)
                                            <a href="{{ url('/filter') }}" class="btn btn-info btnDashboard">Choose Another</a>
                                        @elseif ($nanny->status == 4)
                                            @if (auth()->user()->user_type_id == 4)
                                            <a href="{{ url('/sponsor-dashboard/approve/') . '/' . $nanny->id }}" class="btn btn-success btnDashboard mb-2">Book</a>
                                            <a href="{{ url('/sponsor-dashboard/reject/') . '/' . $nanny->id }}" class="btn btn-danger btnDashboard mb-2">Reject And Replace</a>
                                            @endif
                                            @if (auth()->user()->user_type_id == 3)
                                            <a href="{{ url('/import-agency-dashboard/approve/') . '/' . $nanny->id }}" class="btn btn-success btnDashboard mb-2">Book</a>
                                            <a href="{{ url('/import-agency-dashboard/reject/') . '/' . $nanny->id }}" class="btn btn-danger btnDashboard mb-2">Reject And Replace</a>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="col-12 m-2">
                                            @if (auth()->user()->user_type_id == 4)
                                            <form method="POST" action="{{ url('/sponsor-dashboard/notes') . '/' . $nanny->workers->id . '/' . $nanny->import->id }}">
                                            @endif
                                            @if (auth()->user()->user_type_id == 3)
                                            <form method="POST" action="{{ url('/import-agency-dashboard/notes') . '/' . $nanny->workers->id . '/' . $nanny->import->id }}">
                                            @endif
                                            @csrf
                                            <div class="field" id="searchform">
                                                <input type="text" id="searchterm" name="message" placeholder="Reply">
                                                <button type="submit" id="search" class="btn btn-primary"><i class="far fa-paper-plane"></i></button>
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
                                        <img src="{{ url( 'storage/' . $nanny->workers->main_image) }}" class="mr-3" alt="african">
                                    </div>
                                    <div class="col-12 col-md-10 col-lg-9">
                                        <h5 class="mt-0">
                                            @if ( $nanny->import->user_type_id == 4 )
                                                #{{ $nanny->import->id }} (Sponsor)
                                            @elseif ( $nanny->import->user_type_id == 3 )
                                                #{{ $nanny->import->id }} (Agency)
                                            @endif
                                                request an interview with
                                            <span>
                                                <a class="orderedNanny" href="{{ url('profile') . '/' . $nanny->workers->id }}">{{ $nanny->workers->name }}</a>
                                            </span>
                                            .
                                        </h5>
                                        <p class="mb-0">
                                            Interview date & time:
                                            <span>{{ $nanny->date }} - {{ \Carbon\Carbon::createFromFormat('H:i:s',$nanny->time)->format('g:i a') }}</span>
                                        </p>
                                        <div class="font-weight-bold">
                                            @if ($nanny->status == 2)
                                                <p class="text-danger">The interview with candidate is canceled</p>
                                            @elseif ($nanny->status == 3)
                                                <p class="text-danger">You rejected the request</p>
                                            @elseif ($nanny->status == 4)
                                                <p class="text-info">You confirmed the request</p>
                                            @elseif ($nanny->status == 5)
                                                <p class="text-danger">Rejected</p>
                                            @elseif ($nanny->status == 6)
                                                <p class="text-success">Hired</p>
                                            @endif
                                        </div>
                                    </div>
                                    @if ($nanny->status == 1)
                                    <div class="col-12 text-md-right rightButtons">
                                        @if (auth()->user()->user_type_id == 2)
                                        <a href="{{ url('/broker-dashboard/confirm/') . '/' . $nanny->id }}" class="btn btn-success pl-3 pr-3 mb-2">Confirm the interview</a>
                                        <a href="{{ url('/broker-dashboard/reject-request/') . '/' . $nanny->id }}" class="btn btnCancel btn-danger mb-2">Reject</a>
                                        @endif
                                        @if (auth()->user()->user_type_id == 5)
                                        <a href="{{ url('/export-agency-dashboard/confirm/') . '/' . $nanny->id }}" class="btn btn-success pl-3 pr-3 mb-2">Confirm the interview</a>
                                        <a href="{{ url('/export-agency-dashboard/reject-request/') . '/' . $nanny->id }}" class="btn btnCancel btn-danger mb-2">Reject</a>
                                        @endif
                                    </div>
                                    @endif
                                    <div class="col-12 m-2">
                                        @if (auth()->user()->user_type_id == 2)
                                        <form method="POST" action="{{ url('/broker-dashboard/notes') . '/' . $nanny->workers->id . '/' . $nanny->import->id }}">
                                        @endif
                                        @if (auth()->user()->user_type_id == 5)
                                        <form method="POST" action="{{ url('/export-agency-dashboard/notes') . '/' . $nanny->workers->id . '/' . $nanny->import->id }}">
                                        @endif
                                            @csrf
                                            <div class="field" id="searchform">
                                                <input type="text" id="searchterm" name="message" placeholder="Reply">
                                                <button type="submit" id="search" class="btn btn-primary"><i class="far fa-paper-plane"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@stop
