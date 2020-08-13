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
                        <div class="noCvs col-8 mt-5 mb-5">
                            <img src="{{url('design/site/images/no.png')}}" alt="">
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
                                                {{ $nanny->workers->broker->name }} (Broker)
                                            @elseif ( $nanny->workers->broker->user_type_id == 5 )
                                                {{ $nanny->workers->broker->agency_name }} (Agency)
                                            @endif
                                            </strong>
                                        </h5>
                                        <p class="mb-0">
                                            Interview date & time:
                                            <span>{{ $nanny->date }} - {{ \Carbon\Carbon::createFromFormat('H:i:s',$nanny->time)->format('g:i a') }}</span>
                                        </p>
                                    </div>
                                    <div class="col-12 text-md-right rightButtons">
                                        @if($nanny->workers->status == 1)
                                            <p class="text-danger" style="font-size: 14px">Your request is still pending approval</p>
                                        @endif
                                        <a href="{{ url('/sponsor-dashboard/cancel/') . '/' . $nanny->id }}" class="btn btn-primary btnDashboard">Cancel</a>
                                    </div>
                                    <div class="col-12 m-2">
                                        <form method="POST" action="{{ url('/sponsor-dashboard/notes/') . '/' . $nanny->id }}">
                                            @csrf
                                            <input type="text" name="notes" placeholder="notes" class="form-control">
                                            <button type="submit" class="btn btn-primary">send</button>
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
