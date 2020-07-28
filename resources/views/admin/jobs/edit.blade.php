@extends('admin.layout.index')
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow
        {{request()->cookie('navbar_type') == 'navbar-hidden' ? 'd-none' : ''}}
        {{request()->cookie('navbar_type') == 'navbar-static' ? 'd-none' : ''}}
            "></div>
        <div class="content-wrapper">
            @include('admin.layout.panels.breadcrumb', ['pageName' => 'Edite Job'.' : '.$item->name ,'items'=>[
           [
           'name'=>'jobs',
           'url'=>url('/admin/jobs'),
           ]
           ]
           ])
            <div class="content-header row"></div>
            <div class="content-body">
                <section class="users-edit">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="account" aria-labelledby="account-tab"
                                         role="tabpanel">
                                        <form action="{{str_replace('/edit','',url()->current())}}" method="POST"
                                              class="form form-vertical" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PATCH') }}
                                            <div class="row">
                                                <div class="col-12 col-sm-12">
                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        <div class="row">
                                                            <div class="col-xl-6 col-md-12 col-12">
                                                                @include('admin.components.inputs.text', [
                                                                'name' => 'title',
                                                                'id' => '',
                                                                'type' => 'text',
                                                                'class' => '',
                                                                'value' => $item->title,
                                                                'label' => 'job title',
                                                                'icon' =>'feather icon-user',
                                                                'placeholder' => 'job title',
                                                                'disabled' => false,
                                                                ])
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-12 d-flex flex-sm-row flex-column justify-content-start mt-1">
                                                    <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save Chanches</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- users edit ends -->

            </div>
        </div>
    </div>
@stop
