@extends('admin.layout.index')
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow
        {{request()->cookie('navbar_type') == 'navbar-hidden' ? 'd-none' : ''}}
        {{request()->cookie('navbar_type') == 'navbar-static' ? 'd-none' : ''}}
            "></div>
        <div class="content-wrapper">
            @include('admin.layout.panels.breadcrumb', ['pageName' => 'start in home page' .' : ' ,'items'=>[
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
                                    <h4 class="card-title">start in home page</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                            <form action="{{str_replace('/edit','',url()->current())}}" method="POST" class="form form-vertical" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PATCH') }}
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12 col-lg-6">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'family',
                                                        'id' => '',
                                                        'type' => 'text',
                                                        'class' => '',
                                                        'value' => $item->family,
                                                        'label' => 'family',
                                                        'placeholder' => 'family',
                                                        'disabled' => false,
                                                        ])
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="col-12 col-lg-6">
                                                            @include('admin.components.inputs.text', [
                                                            'name' => 'family_instruction1',
                                                            'id' => '',
                                                            'type' => 'text',
                                                            'class' => '',
                                                            'value' => $item->family_instruction1,
                                                            'label' => 'information 1',
                                                            'placeholder' => 'information 1',
                                                            'disabled' => false,
                                                            ])
                                                        </div>
                                                        <div class="col-12 col-lg-6">
                                                            @include('admin.components.inputs.text', [
                                                            'name' => 'family_instruction2',
                                                            'id' => '',
                                                            'type' => 'text',
                                                            'class' => '',
                                                            'value' => $item->family_instruction2,
                                                            'label' => 'information 2',
                                                            'placeholder' => 'information 2',
                                                            'disabled' => false,
                                                            ])
                                                        </div>
                                                        <div class="col-12 col-lg-6">
                                                            @include('admin.components.inputs.text', [
                                                            'name' => 'family_instruction3',
                                                            'id' => '',
                                                            'type' => 'text',
                                                            'class' => '',
                                                            'value' => $item->family_instruction3,
                                                            'label' => 'information 3',
                                                            'placeholder' => 'information 3',
                                                            'disabled' => false,
                                                            ])
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-6">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'sourcing',
                                                        'id' => '',
                                                        'type' => 'text',
                                                        'class' => '',
                                                        'value' => $item->sourcing,
                                                        'label' => 'sourcing agency',
                                                        'placeholder' => 'sourcing agency',
                                                        'disabled' => false,
                                                        ])
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="col-12 col-lg-6">
                                                            @include('admin.components.inputs.text', [
                                                            'name' => 'sourcing_instruction1',
                                                            'id' => '',
                                                            'type' => 'text',
                                                            'class' => '',
                                                            'value' => $item->sourcing_instruction1,
                                                            'label' => 'information 1',
                                                            'placeholder' => 'information 1',
                                                            'disabled' => false,
                                                            ])
                                                        </div>
                                                        <div class="col-12 col-lg-6">
                                                            @include('admin.components.inputs.text', [
                                                            'name' => 'sourcing_instruction2',
                                                            'id' => '',
                                                            'type' => 'text',
                                                            'class' => '',
                                                            'value' => $item->sourcing_instruction2,
                                                            'label' => 'information 2',
                                                            'placeholder' => 'information 2',
                                                            'disabled' => false,
                                                            ])
                                                        </div>
                                                        <div class="col-12 col-lg-6">
                                                            @include('admin.components.inputs.text', [
                                                            'name' => 'sourcing_instruction3',
                                                            'id' => '',
                                                            'type' => 'text',
                                                            'class' => '',
                                                            'value' => $item->sourcing_instruction3,
                                                            'label' => 'information 3',
                                                            'placeholder' => 'information 3',
                                                            'disabled' => false,
                                                            ])
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-6">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'agent',
                                                        'id' => '',
                                                        'type' => 'text',
                                                        'class' => '',
                                                        'value' => $item->agent,
                                                        'label' => 'sub-agent',
                                                        'placeholder' => 'sub-agent',
                                                        'disabled' => false,
                                                        ])
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="col-12 col-lg-6">
                                                            @include('admin.components.inputs.text', [
                                                            'name' => 'agent_instruction1',
                                                            'id' => '',
                                                            'type' => 'text',
                                                            'class' => '',
                                                            'value' => $item->agent_instruction1,
                                                            'label' => 'information 1',
                                                            'placeholder' => 'information 1',
                                                            'disabled' => false,
                                                            ])
                                                        </div>
                                                        <div class="col-12 col-lg-6">
                                                            @include('admin.components.inputs.text', [
                                                            'name' => 'agent_instruction2',
                                                            'id' => '',
                                                            'type' => 'text',
                                                            'class' => '',
                                                            'value' => $item->agent_instruction2,
                                                            'label' => 'information 2',
                                                            'placeholder' => 'information 2',
                                                            'disabled' => false,
                                                            ])
                                                        </div>
                                                        <div class="col-12 col-lg-6">
                                                            @include('admin.components.inputs.text', [
                                                            'name' => 'agent_instruction3',
                                                            'id' => '',
                                                            'type' => 'text',
                                                            'class' => '',
                                                            'value' => $item->agent_instruction3,
                                                            'label' => 'information 3',
                                                            'placeholder' => 'information 3',
                                                            'disabled' => false,
                                                            ])
                                                        </div>
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
