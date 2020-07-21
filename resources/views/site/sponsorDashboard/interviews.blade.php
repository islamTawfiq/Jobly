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
                                        <h5 class="mt-0">You have an interview with
                                            <span>
                                                <a class="orderedNanny" href="{{ url('profile') . '/' . $nanny->id }}">{{ $nanny->name }}</a>
                                            </span>
                                            from
                                            <strong>
                                            @if ( $nanny->broker->user_type_id == 2 )
                                                {{ $nanny->broker->name }} (Broker)
                                            @elseif ( $nanny->broker->user_type_id == 5 )
                                                {{ $nanny->broker->agency_name }} (Agency)
                                            @endif
                                            </strong>
                                        </h5>
                                        <p class="mb-0">
                                            Interview date & time:
                                            <span>{{ $nanny->date }} - {{ \Carbon\Carbon::createFromFormat('H:i:s',$nanny->time)->format('g:i a') }}</span>
                                        </p>
                                    </div>
                                    <div class="col-12 text-md-right rightButtons">
                                        <a href="{{ url('/sponsor-dashboard/aprove/') . '/' . $nanny->id }}" class="btn btn-success">Approve</a>
                                        <a href="{{ url('/sponsor-dashboard/cancel/') . '/' . $nanny->id }}" class="btn btn-danger">Reject</a>
                                    </div>
                                    <div class="col-12">
                                        {{--  <!-- Button trigger modal -->  --}}
                                        <button type="button" class="btn btn-primary mt-2 mt-md-0" style="font-size: 13px" data-toggle="modal" data-target="#dtl-{{ $nanny->id }}">See All Details</button>
                                        {{--  <!-- Modal -->  --}}
                                        <div class="modal fade" id="dtl-{{ $nanny->id }}" tabindex="-1" role="dialog" aria-labelledby="detailsCenterTitle" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title">All Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                  @if ($nanny->broker->agency_name)
                                                  <div>
                                                    <p class="d-inline-block">Agency Name : </p>
                                                    <span class="font-weight-bold">{{ $nanny->broker->agency_name }}</span>
                                                  </div>
                                                  @endif
                                                  @if ($nanny->broker->manager_name)
                                                  <div>
                                                    <p class="d-inline-block">Manager Name : </p>
                                                    <span class="font-weight-bold">{{ $nanny->broker->manager_name }}</span>
                                                  </div>
                                                  @endif
                                                  @if ($nanny->broker->name)
                                                  <div>
                                                    <p class="d-inline-block">Name : </p>
                                                    <span class="font-weight-bold">{{ $nanny->broker->name }}</span>
                                                  </div>
                                                  @endif
                                                  <div>
                                                    <p class="d-inline-block">Mobil Number : </p>
                                                    <span class="font-weight-bold">{{ $nanny->broker->phone }}</span>
                                                  </div>
                                                  @if ($nanny->broker->telephone)
                                                  <div>
                                                    <p class="d-inline-block">Telephone : </p>
                                                    <span class="font-weight-bold">{{ $nanny->broker->telephone }}</span>
                                                  </div>
                                                  @endif
                                                  <div>
                                                    <p class="d-inline-block">Email : </p>
                                                    <span class="font-weight-bold">{{ $nanny->broker->email }}</span>
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
