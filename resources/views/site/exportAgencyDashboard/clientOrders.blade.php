@extends('site.layout.dashboard')
@section('content')
    <main>

        @include('site.components.dashboard.topMain', ['pageName' => 'Client Orders'])

        <div class="myOrder">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 text-center text-lg-left">
                        <p class="h5 mt-2">You have {{ count($nannies) }} {{ (count($nannies) > 1 ) ? 'requests' : 'request' }} </p>
                    </div>
                    {{--  <div class="col-12 col-lg-6">
                        <div class="requestStatus">
                            <div class="container">
                                <div class="row">
                                    <div class="col colorStatus">
                                        <span class="hiredStatus"></span>
                                        <span class="font-weight-bold">0</span>
                                        <span class="text-muted">Hired</span>
                                    </div>
                                    <div class="col colorStatus">
                                        <span class="waitingStatus"></span>
                                        <span class="font-weight-bold">0</span>
                                        <span class="text-muted">Cancled</span>
                                    </div>
                                    <div class="col colorStatus">
                                        <span class="pendingStatus"></span>
                                        <span class="font-weight-bold">0</span>
                                        <span class="text-muted">Pending</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  --}}

                    @if ($nannies->count() == 0)
                    <div class="col-12">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="noCvs col-12 col-md-8 mt-3 mb-5">
                                <img src="{{url('design/site/images/no.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                    @endif
                    @foreach ($nannies as $nanny)
                    <div class="col-12">
                        <div class="requestAnInterview text-center text-md-left" @if ($nannies->count() == 1) {{ 'style=margin-bottom:200px' }} @elseif($nannies->count() == 2) {{ 'style=margin-bottom:12px;margin-top:12px' }} @endif >
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
                                        <p class="mb-0">Interview date & time:
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
                                        <a href="{{ url('/export-agency-dashboard/confirm/') . '/' . $nanny->id }}" class="btn btn-success pl-3 pr-3">Confirm the interview</a>
                                        <a href="{{ url('/export-agency-dashboard/reject-request/') . '/' . $nanny->id }}" class="btn btnCancel btn-danger">Reject</a>
                                    </div>
                                    @endif
                                    <div class="col-12 m-2">
                                        <form method="POST" action="{{ url('/export-agency-dashboard/notes') . '/' . $nanny->nanny_id . '/' . $nanny->import->id }}">
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
