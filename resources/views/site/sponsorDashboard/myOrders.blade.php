@extends('site.layout.dashboard')
@section('content')
    <main>

        @include('site.components.dashboard.topMain', ['pageName' => 'My Orders'])

        <!-- myOrders -->
        <div class="myOrder">
            <div class="container">
                <div class="row">
                    {{-- <div class="col-12">
                        <p class="h5">You have to choose 3 CVs with $10 to starting the interviews</p>
                    </div> --}}
                    @if ($nannies->count() == 0)
                    <div class="col-2"></div>
                        <div class="noCvs col-8">
                            <img src="{{url('design/site/images/we-are-sorry.png')}}" alt="">
                        </div>
                    @endif
                    @foreach ($nannies as $nanny)
                    <div class="col-12" @if ($nannies->count() == 1) {{ 'style=margin-bottom:200px' }} @elseif($nannies->count() == 2) {{ 'style=margin-bottom:12px;margin-top:12px' }} @endif >
                        <div class="requestAnInterview text-center text-md-left">
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
                                    <div class="col-12 text-md-right rightButtons mb-2 mb-md-0">
                                        @if ($nanny->status == 1)
                                            <a href="{{ url('/sponsor-dashboard/cancel/') . '/' . $nanny->id }}" class="btn btn-danger btnDashboard mb-2">Cancel</a>
                                        @elseif ($nanny->status == 2 || $nanny->status == 3 || $nanny->status == 5)
                                            <a href="{{ url('/filter') }}" class="btn btn-info btnDashboard mb-2">Choose Another</a>
                                        @elseif ($nanny->status == 4)
                                            <a href="{{ url('/sponsor-dashboard/approve/') . '/' . $nanny->id }}" class="btn btn-success btnDashboard mb-2">Book</a>
                                            <a href="{{ url('/sponsor-dashboard/reject/') . '/' . $nanny->id }}" class="btn btn-danger btnDashboard mb-2">Reject And Replace</a>
                                        @endif
                                    </div>
                                    <div class="col-12 m-2">
                                        <form method="POST" action="{{ url('/sponsor-dashboard/notes/') . '/' . $nanny->nanny_id . '/' . $nanny->workers->broker->id }}">
                                            @csrf
                                            <div class="field" id="searchform">
                                                <input type="text" id="searchterm" name="message" placeholder="Reply">
                                                <button type="submit" id="search" class="btn btn-primary"><i class="far fa-paper-plane"></i></button>
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
