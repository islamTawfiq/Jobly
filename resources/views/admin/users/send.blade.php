@extends('admin.layout.index')
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow
            {{request()->cookie('navbar_type') == 'navbar-hidden' ? 'd-none' : ''}}
            {{request()->cookie('navbar_type') == 'navbar-static' ? 'd-none' : ''}}">
        </div>
        <div class="content-wrapper">
            @include('admin.layout.panels.breadcrumb', ['pageName' => 'Send Message' .' : '.$user->name ,'items'=>[
            [
            'name'=>'Send Message',
            'url'=>'',
            ]
            ]
            ])
            <div class="content-body">
                <section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-md-6 col-12 mx-auto">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"> {{ 'Send Message To ' . $user->name}}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form method="POST" action="{{ url('/admin/user/') . '/' . $user->id . '/send' }}" id="" class="" enctype="multipart/form-data">
                                            @csrf
                                            <div class="add-new-data-sidebar">
                                                <div class="add-new-data">
                                                    <div class="data-items">
                                                        <div class="data-fields px-2">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                        @include('site.components.inputs.textarea', [
                                                                            'name' => 'message',
                                                                            'id'   => '',
                                                                            'class' => '',
                                                                            'value' => '',
                                                                            'label' => 'Send Message / Notifications',
                                                                            'placeholder' => 'Write here…',
                                                                            'maxlength' => '1000',
                                                                        ])
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                                        <div class="add-data-btn">
                                                            <button type="submit" class="btn btn-primary">Send</button>
                                                        </div>
                                                        <div class="cancel-data-btn">
                                                            <button type="reset" class="btn btn-outline-danger">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@stop

