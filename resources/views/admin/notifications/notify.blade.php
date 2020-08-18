@extends('admin.layout.index')
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow
            {{request()->cookie('navbar_type') == 'navbar-hidden' ? 'd-none' : ''}}
            {{request()->cookie('navbar_type') == 'navbar-static' ? 'd-none' : ''}}">
        </div>
        <div class="content-wrapper">
            @include('admin.layout.panels.breadcrumb', ['pageName' => 'Request Status' .' : '.$nanny->name ,'items'=>[
            [
            'name'=>'Reservations',
            'url'=>url('/admin/reservations'),
            ]
            ]
            ])
            <div class="content-body">
                <div class="myOrder">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="requestAnInterview text-center text-md-left">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 col-md-2 col-lg-1 mr-lg-3">
                                                <img src="{{ url( 'storage/' . $nanny->workers->main_image) }}" class="mr-3" alt="african">
                                            </div>
                                            <div class="col-12 col-md-10 col-lg-9">
                                                <h5 class="mt-0">
                                                    @if ( $nanny->import->user_type_id == 3 )
                                                        #{{ $nanny->import->id }} {{ $nanny->import->name }} (Agency)
                                                    @elseif ( $nanny->import->user_type_id == 4 )
                                                        #{{ $nanny->import->id }} {{ $nanny->import->name }} (Sponsor)
                                                    @endif
                                                    request an interview with
                                                    <span>
                                                        <a class="orderedNanny" href="{{ url('profile') . '/' . $nanny->workers->id }}">{{ $nanny->workers->name }}</a>
                                                    </span>
                                                    from
                                                    <strong>
                                                    @if ( $nanny->export->user_type_id == 2 )
                                                       #{{ $nanny->export->id }} {{ $nanny->export->name }} (Agent)
                                                    @elseif ( $nanny->export->user_type_id == 5 )
                                                       #{{ $nanny->export->id }} {{ $nanny->export->name }} (Agency)
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
                                                        <p class="text-danger">{{ $nanny->import->name }} canceled the request</p>
                                                    @elseif ($nanny->status == 3)
                                                        <p class="text-danger">{{ $nanny->export->name }} rejected the request for interview</p>
                                                    @elseif ($nanny->status == 4)
                                                        <p class="text-info">{{ $nanny->export->name }} confirmed the request for interview</p>
                                                    @elseif ($nanny->status == 5)
                                                        <p class="text-danger">{{ $nanny->import->name }} rejected the candidate</p>
                                                    @elseif ($nanny->status == 6)
                                                        <p class="text-success">{{ $nanny->import->name }} hired the candidate</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
