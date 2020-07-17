@extends('site.layout.dashboard')
@section('content')
    <main>

        @include('site.components.dashboard.topMain', ['pageName' => 'My Interviews'])

        <div class="myOrder">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 text-center text-lg-left">
                        <p class="h5 mt-2">You have {{ count($nannies) }} {{ (count($nannies) > 1 ) ? 'requests' : 'request' }} </p>
                    </div>
                    @if ($nannies->count() == 0)
                    <div class="col-12">
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="noCvs col-6">
                                <img src="{{url('design/site/images/no.jpg')}}" alt="">
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
                                            @if ( $nanny->agency->name )
                                                {{ $nanny->agency->name }} (Sponsor)
                                            @elseif ( $nanny->agency->agency_name )
                                                {{ $nanny->agency->agency_name }} (Agency)
                                            @endif
                                                request an interview with
                                            <span>
                                                <a class="orderedNanny" href="{{ url('profile') . '/' . $nanny->id }}">{{ $nanny->name }}</a>
                                            </span>
                                            .
                                        </h5>
                                        <div class="float-lg-right">
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
                                                      @if ($nanny->agency->agency_name)
                                                      <div>
                                                        <p class="d-inline-block">Agency Name : </p>
                                                        <span class="font-weight-bold">{{ $nanny->agency->agency_name }}</span>
                                                      </div>
                                                      @endif
                                                      @if ($nanny->agency->manager_name)
                                                      <div>
                                                        <p class="d-inline-block">Manager Name : </p>
                                                        <span class="font-weight-bold">{{ $nanny->agency->manager_name }}</span>
                                                      </div>
                                                      @endif
                                                      @if ($nanny->agency->name)
                                                      <div>
                                                        <p class="d-inline-block">Name : </p>
                                                        <span class="font-weight-bold">{{ $nanny->agency->name }}</span>
                                                      </div>
                                                      @endif
                                                      <div>
                                                        <p class="d-inline-block">Mobil Number : </p>
                                                        <span class="font-weight-bold">{{ $nanny->agency->phone }}</span>
                                                      </div>
                                                      @if ($nanny->agency->telephone)
                                                      <div>
                                                        <p class="d-inline-block">Telephone : </p>
                                                        <span class="font-weight-bold">{{ $nanny->agency->telephone }}</span>
                                                      </div>
                                                      @endif
                                                      <div>
                                                        <p class="d-inline-block">Email : </p>
                                                        <span class="font-weight-bold">{{ $nanny->agency->email }}</span>
                                                      </div>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        <p class="mb-0">Interview date & time: <span>{{ $nanny->date }}, {{ $nanny->time }}</span></p>
                                        <p>Phne Number <span> +{{ $nanny->agency->phone }}</span></p>
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
