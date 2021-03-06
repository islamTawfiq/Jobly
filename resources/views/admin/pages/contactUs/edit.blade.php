@extends('admin.layout.index')
@section('page_css')
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/plugins/forms/wizard.css')}}">
@stop
@section('page_js')
    <script src="{{url('design/admin/vendors/js/extensions/jquery.steps.min.js')}}"></script>
    <script src="{{url('design/admin/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <script src="{{url('design/admin/js/scripts/forms/wizard-steps.js')}}"></script>
@stop
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow
        {{request()->cookie('navbar_type') == 'navbar-hidden' ? 'd-none' : ''}}
        {{request()->cookie('navbar_type') == 'navbar-static' ? 'd-none' : ''}}
            "></div>
        <div class="content-wrapper">
            @include('admin.layout.panels.breadcrumb', ['pageName' => 'Contact Us' .' : ' ,'items'=>[
            [
            'name'=>'Contact Us',
            'url'=>url('/admin/contact-us'),
            ]
            ]
            ])
            <div class="content-body">
                <section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-md-12 col-12 mx-auto">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Contact Us</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                            <form action="{{str_replace('/edit','',url()->current())}}" method="POST" class="form form-vertical" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PATCH') }}
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-xl-6 col-md-6 col-6 mb-2">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'mobile',
                                                        'id' => 'mobile',
                                                        'type' => 'number',
                                                        'class' => 'mobile',
                                                        'value' => $item->mobile,
                                                        'label' => 'Mobile',
                                                        'placeholder' => 'Mobile',
                                                        'disabled' => false,
                                                        ])

                                                    </div>


                                                    <div class="col-xl-12 col-md-12 col-12 mb-2">
                                                        @include('admin.components.inputs.textEditor', [
                                                        'name' => 'text',
                                                        'id' => 'text',
                                                        'type' => 'text',
                                                        'class' => 'text',
                                                        'value' => $item->text,
                                                        'label' => 'Body',
                                                        'icon' =>'fa fa-paragraph',
                                                        'placeholder' => 'Body',
                                                        'disabled' => false,
                                                        ])
                                                    </div>

                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
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
