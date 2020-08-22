@extends('admin.layout.index')
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow
        {{request()->cookie('navbar_type') == 'navbar-hidden' ? 'd-none' : ''}}
        {{request()->cookie('navbar_type') == 'navbar-static' ? 'd-none' : ''}}
            "></div>
        <div class="content-wrapper">
            @include('admin.layout.panels.breadcrumb', ['pageName' => 'Links' .' : ' ,'items'=>[
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
                                    <h4 class="card-title">Links</h4>
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
                                                        'name' => 'home',
                                                        'id' => '',
                                                        'type' => 'text',
                                                        'class' => '',
                                                        'value' => $item->home,
                                                        'label' => 'home',
                                                        'placeholder' => 'home',
                                                        'disabled' => false,
                                                        ])
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-6">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'domestic_workers',
                                                        'id' => '',
                                                        'type' => 'text',
                                                        'class' => '',
                                                        'value' => $item->domestic_workers,
                                                        'label' => 'domestic workers',
                                                        'placeholder' => 'domestic workers',
                                                        'disabled' => false,
                                                        ])
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-6">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'local_domestic_workers',
                                                        'id' => '',
                                                        'type' => 'text',
                                                        'class' => '',
                                                        'value' => $item->local_domestic_workers,
                                                        'label' => 'local domestic workers',
                                                        'placeholder' => 'local domestic workers',
                                                        'disabled' => false,
                                                        ])
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-6">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'about',
                                                        'id' => '',
                                                        'type' => 'text',
                                                        'class' => '',
                                                        'value' => $item->about,
                                                        'label' => 'about',
                                                        'placeholder' => 'about',
                                                        'disabled' => false,
                                                        ])
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-6">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'contact',
                                                        'id' => '',
                                                        'type' => 'text',
                                                        'class' => '',
                                                        'value' => $item->contact,
                                                        'label' => 'contact',
                                                        'placeholder' => 'contact',
                                                        'disabled' => false,
                                                        ])
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-6">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'sourcing_broker',
                                                        'id' => '',
                                                        'type' => 'text',
                                                        'class' => '',
                                                        'value' => $item->sourcing_broker,
                                                        'label' => 'sourcing broker',
                                                        'placeholder' => 'sourcing broker',
                                                        'disabled' => false,
                                                        ])
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-6">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'sourcing_agency',
                                                        'id' => '',
                                                        'type' => 'text',
                                                        'class' => '',
                                                        'value' => $item->sourcing_agency,
                                                        'label' => 'sourcing agency',
                                                        'placeholder' => 'sourcing agency',
                                                        'disabled' => false,
                                                        ])
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-6">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'recruitment_agency',
                                                        'id' => '',
                                                        'type' => 'text',
                                                        'class' => '',
                                                        'value' => $item->recruitment_agency,
                                                        'label' => 'recruitment agency',
                                                        'placeholder' => 'recruitment agency',
                                                        'disabled' => false,
                                                        ])
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-6">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'sponsorship',
                                                        'id' => '',
                                                        'type' => 'text',
                                                        'class' => '',
                                                        'value' => $item->sponsorship,
                                                        'label' => 'sponsorship',
                                                        'placeholder' => 'sponsorship',
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
