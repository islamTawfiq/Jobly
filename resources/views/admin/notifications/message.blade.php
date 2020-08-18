@extends('admin.layout.index')
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow
            {{request()->cookie('navbar_type') == 'navbar-hidden' ? 'd-none' : ''}}
            {{request()->cookie('navbar_type') == 'navbar-static' ? 'd-none' : ''}}">
        </div>
        <div class="content-wrapper">
            @include('admin.layout.panels.breadcrumb', ['pageName' => 'Message' .' : '.$message->name ,'items'=>[
            [
            'name'=>'Messages',
            'url'=>url('/admin/messages'),
            ]
            ]
            ])
            <div class="content-body">
                <div class="myOrder">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="requestAnInterview text-center text-md-left">
                                    @if ($message->send->user_type_id == 3 || $message->send->user_type_id == 4)
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 col-md-2 col-lg-1 mr-lg-3">
                                                <img src="{{ url( 'storage/' . $message->workers->main_image) }}" class="mr-3" alt="african">
                                            </div>
                                            <div class="col-12 col-md-10 col-lg-9">
                                                <h6 class="mt-0">
                                                    <strong>
                                                        @if ( $message->recive->user_type_id == 2 )
                                                        #{{ $message->recive->id }} (Broker)
                                                        @elseif ( $message->recive->user_type_id == 5 )
                                                        #{{ $message->recive->id }} (Agency)
                                                        @endif
                                                    </strong>
                                                     Responsible for the candidate
                                                     <a class="candidate" href="{{ url('profile') . '/' . $message->workers->id }}">{{ $message->workers->name }}</a>
                                                     as {{ $message->workers->job_name }} sent this message for <strong> #{{ $message->send->id }} {{ $message->send->name }}</strong>...
                                                </h6>
                                                <p>"{{ $message->message }}"</p>
                                            </div>
                                            <div class="col-12 text-right">
                                                <span style="font-size: 14px" class="float-right">{{ $message->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if ($message->send->user_type_id == 2 || $message->send->user_type_id == 5)
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 col-md-2 col-lg-1 mr-lg-3">
                                                <img src="{{ url( 'storage/' . $message->workers->main_image) }}" class="mr-3" alt="african">
                                            </div>
                                            <div class="col-12 col-md-10 col-lg-9">
                                                <h6 class="mt-0">
                                                    <strong>
                                                    @if ( $message->recive->user_type_id == 4 )
                                                        #{{ $message->recive->id }} (Sponsor)
                                                    @elseif ( $message->recive->user_type_id == 3 )
                                                    #{{ $message->recive->id }} (Agency)
                                                    @endif
                                                    </strong>
                                                    who request the candidate
                                                     <a class="candidate" href="{{ url('profile') . '/' . $message->workers->id }}">{{ $message->workers->name }}</a>
                                                     from<strong> #{{ $message->send->id }} {{ $message->send->name }}</strong>
                                                     as {{ $message->workers->job_name }} sent this message...
                                                </h6>
                                                <p>"{{ $message->message }}"</p>
                                            </div>
                                            <div class="col-12 text-right">

                                                <span style="font-size: 14px" class="float-right">{{ $message->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
