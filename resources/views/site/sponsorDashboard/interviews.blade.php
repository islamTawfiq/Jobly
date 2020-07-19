@extends('site.layout.dashboard')
@section('content')
    <main>

        @include('site.components.dashboard.topMain', ['pageName' => 'My interviews'])

        <!-- myOrders -->
        <div class="myOrder">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p class="h5">You have to choose 3 CVs with $10 to starting the interviews</p>
                    </div>
                    @if ($nannies->count() == 0)
                    <div class="col-3"></div>
                        <div class="noCvs col-6">
                            <img src="{{url('design/site/images/no.jpg')}}" alt="">
                        </div>
                    @endif
                    @foreach ($nannies as $nanny)
                    <div class="col-12" @if ($nannies->count() == 1) {{ 'style=margin-bottom:200px' }} @elseif($nannies->count() == 2) {{ 'style=margin-bottom:12px;margin-top:12px' }} @endif >
                        <div class="requestAnInterview text-center text-md-left">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-2 col-lg-1 mr-lg-3">
                                        <img src="{{ url( 'storage/' . $nanny->main_image) }}" class="mr-3" alt="african">
                                    </div>
                                    <div class="col-12 col-md-10 col-lg-9">
                                        <h5 class="mt-0">You have an interview with <strong>{{ $nanny->name }}</strong>
                                            from <strong>{{ $nanny->broker->name }}</strong>
                                        </h5>
                                        <p class="mb-0">
                                            Interview date & time:
                                            <span>{{ $nanny->date }} - {{ \Carbon\Carbon::createFromFormat('H:i:s',$nanny->time)->format('g:i a') }}</span>
                                        </p>
                                    </div>
                                    <div class="col-12 text-md-right rightButtons">
                                        <a href="{{ url('/sponsor-dashboard/aprove/') . '/' . $nanny->id }}" class="btn btn-success btnDashboard">Approve</a>
                                        <a href="{{ url('/sponsor-dashboard/cancel/') . '/' . $nanny->id }}" class="btn btn-danger btnDashboard">Reject</a>
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
