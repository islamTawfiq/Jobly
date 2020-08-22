@extends('admin.layout.index')
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow
        {{request()->cookie('navbar_type') == 'navbar-hidden' ? 'd-none' : ''}}
        {{request()->cookie('navbar_type') == 'navbar-static' ? 'd-none' : ''}}
            "></div>
        <div class="content-wrapper">
            @include('admin.layout.panels.breadcrumb', ['pageName' => 'Broker Instruction' .' : ' ,'items'=>[
            [
            'name'=>'',
            'url'=>'',
            ]
            ]
            ])
            <div class="content-body">
                <section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-md-12 col-12 mx-auto">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Broker Instruction</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                            <form action="{{str_replace('/edit','',url()->current())}}" method="POST" class="form form-vertical" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PATCH') }}
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-xl-6 col-md-6 col-6">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'title',
                                                        'id' => 'title',
                                                        'type' => 'text',
                                                        'class' => 'title',
                                                        'value' => $item->title,
                                                        'label' => 'Title',
                                                        'placeholder' => 'Title',
                                                        'disabled' => false,
                                                        ])

                                                    </div>

                                                    <div class="col-xl-12 col-md-12 col-12 mt-2">
                                                        @include('admin.components.inputs.textEditor', [
                                                        'name' => 'body',
                                                        'id' => 'body',
                                                        'type' => 'text',
                                                        'class' => 'body',
                                                        'value' => $item->body,
                                                        'label' => 'Body',
                                                        'icon' =>'fa fa-paragraph',
                                                        'placeholder' => 'Body',
                                                        'disabled' => false,
                                                        ])
                                                    </div>

                                                    <div class="col-12 mt-2">
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
