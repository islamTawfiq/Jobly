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
                                        <img src="{{ url( 'storage/' . $nanny->main_image) }}" class="mr-3" alt="african">
                                    </div>
                                    <div class="col-12 col-md-10 col-lg-9">
                                        <h5 class="mt-0">
                                            @if ( $nanny->reserve->user_type_id == 4 )
                                                {{ $nanny->reserve->name }} (Sponsor)
                                            @elseif ( $nanny->reserve->user_type_id == 3 )
                                                {{ $nanny->reserve->agency_name }} (Agency)
                                            @endif
                                                request an interview with
                                            <span>
                                                <a class="orderedNanny" href="{{ url('profile') . '/' . $nanny->id }}">{{ $nanny->name }}</a>
                                            </span>
                                            .
                                        </h5>
                                        <p class="mb-0">Interview date & time: <span>{{ $nanny->date }}, {{ $nanny->time }}</span></p>
                                        <p>Phne Number <span> +{{ $nanny->reserve->phone }}</span></p>
                                    </div>
                                    <div class="col-12 text-md-right rightButtons">
                                        <a href="{{ url('/export-agency-dashboard/confirm/') . '/' . $nanny->id }}" class="btn btn-success pl-3 pr-3">Confirm the interview</a>
                                        <a href="{{ url('/export-agency-dashboard/reject/') . '/' . $nanny->id }}" class="btn btnCancel btn-danger">Reject</a>
                                    </div>
                                    <div class="col-12">
                                        {{--  <!-- Button trigger modal -->  --}}
                                        <button type="button" class="btn btn-primary mt-2 mt-md-0" style="font-size: 13px" data-toggle="modal" data-target="#details-{{ $nanny->id }}">See All Details</button>
                                        {{--  <!-- Modal -->  --}}
                                        <div class="modal fade" id="details-{{ $nanny->id }}" tabindex="-1" role="dialog" aria-labelledby="detailsCenterTitle" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">All Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                  @if ($nanny->reserve->agency_name)
                                                  <div>
                                                    <p class="d-inline-block">Agency Name : </p>
                                                    <span class="font-weight-bold">{{ $nanny->reserve->agency_name }}</span>
                                                  </div>
                                                  @endif
                                                  @if ($nanny->reserve->manager_name)
                                                  <div>
                                                    <p class="d-inline-block">Manager Name : </p>
                                                    <span class="font-weight-bold">{{ $nanny->reserve->manager_name }}</span>
                                                  </div>
                                                  @endif
                                                  @if ($nanny->reserve->name)
                                                  <div>
                                                    <p class="d-inline-block">Name : </p>
                                                    <span class="font-weight-bold">{{ $nanny->reserve->name }}</span>
                                                  </div>
                                                  @endif
                                                  <div>
                                                    <p class="d-inline-block">Mobil Number : </p>
                                                    <span class="font-weight-bold">{{ $nanny->reserve->phone }}</span>
                                                  </div>
                                                  @if ($nanny->reserve->telephone)
                                                  <div>
                                                    <p class="d-inline-block">Telephone : </p>
                                                    <span class="font-weight-bold">{{ $nanny->reserve->telephone }}</span>
                                                  </div>
                                                  @endif
                                                  <div>
                                                    <p class="d-inline-block">Email : </p>
                                                    <span class="font-weight-bold">{{ $nanny->reserve->email }}</span>
                                                  </div>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
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
