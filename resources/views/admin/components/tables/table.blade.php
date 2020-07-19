@extends('admin.layout.index')
@section('page_css')
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/pages/data-list-view.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/pages/dataTables.material.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/vendors/css/tables/datatable/buttons.dataTables.min.css')}}">
@stop
@section('page_js')
    @yield('table_scripts')
    @include('admin.components.tables.tablescripts')
@stop
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow
{{request()->cookie('navbar_type') == 'navbar-hidden' ? 'd-none' : ''}}
{{request()->cookie('navbar_type') == 'navbar-static' ? 'd-none' : ''}}
            "></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">@yield("pageName")</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('admin/')}}">Home</a></li>
                                    <li class="breadcrumb-item active">@yield("pageName")</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Data list view starts -->
                <section id="data-list-view" class="data-list-view-header">
                    <!-- DataTable starts -->
                    <div class="table-responsive">
                        <table class="table data-list-view">
                            <thead>
                            @yield("thead")
                            </thead>
                            <tbody>
                            @yield("tbody")
                            </tbody>
                        </table>
                    </div>
                    <!-- add new sidebar starts -->
                @yield("modal")
                    <!-- add new sidebar ends -->
                </section>
                <!-- Data list view end -->
            </div>
        </div>
    </div>
@stop
