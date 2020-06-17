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
                    <div class="col-12 col-lg-6">
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
                                        <span class="text-muted">Waiting</span>
                                    </div>
                                    <div class="col colorStatus">
                                        <span class="pendingStatus"></span>
                                        <span class="font-weight-bold">0</span>
                                        <span class="text-muted">Pending</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach ($nannies as $nanny)
                    <div class="col-12">
                        <div class="requestAnInterview text-center text-md-left" @if ($nannies->count() == 1) {{ 'style=margin-bottom:200px' }} @elseif($nannies->count() == 2) {{ 'style=margin-bottom:12px;margin-top:12px' }} @endif >
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-2 col-lg-1 mr-lg-3">
                                        <img src="{{ url( 'storage/' . $nanny->main_image) }}" class="mr-3" alt="african">
                                    </div>
                                    <div class="col-12 col-md-10 col-lg-9">
                                        <h5 class="mt-0">{{ $nanny->agency->agency_name }} request an interview with
                                            <span>
                                                <a class="orderedNanny" href="{{ url('profile') . '/' . $nanny->id }}">{{ $nanny->name }}</a>
                                            </span>
                                            .
                                        </h5>
                                        <p class="mb-0">Interview date & time: <span>{{ $nanny->date }}, {{ $nanny->time }}</span></p>
                                        <p>Phne Number <span> +{{ $nanny->agency->phone }}</span></p>
                                    </div>
                                    <div class="col-12 text-md-right rightButtons">
                                        <a href="" class="btn btn-primary pl-3 pr-3">Contact Candidate</a>
                                        <a href="" class="btn btnCancel">Cancel</a>
                                        <a href="" class="contactsToClient">send contacts to client or feedback</a>
                                    </div>
                                    <div class="col-12">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#details">See All Details</button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="details" tabindex="-1" role="dialog" aria-labelledby="detailsCenterTitle" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">All Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                  <div>
                                                      <p class="d-inline-block">Agency Name : </p>
                                                      <span class="font-weight-bold">{{ $nanny->agency->agency_name }}</span>
                                                  </div>
                                                  <div>
                                                    <p class="d-inline-block">Manager Name : </p>
                                                    <span class="font-weight-bold">{{ $nanny->agency->manager_name }}</span>
                                                  </div>
                                                  <div>
                                                    <p class="d-inline-block">Mobil Number : </p>
                                                    <span class="font-weight-bold">{{ $nanny->agency->phone }}</span>
                                                  </div>
                                                  <div>
                                                    <p class="d-inline-block">Telephone : </p>
                                                    <span class="font-weight-bold">{{ $nanny->agency->telephone }}</span>
                                                  </div>
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
