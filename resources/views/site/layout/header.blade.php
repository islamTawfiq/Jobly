<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="{{$settings->description}}">
    <meta name="keywords" content="{{$settings->keyWords}}">
    <meta name="author" content="Vector|01068193395">
    <title>@yield('title',$settings->title)</title>
    <link rel="apple-touch-icon" href="{{$settings->main_icon}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ $settings->main_icon }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Styles CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/vendors/css/vendors.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{url('design/site/css/bootstrap.min.css')}}" >
    <link rel="stylesheet" type="text/css"  href="{{url('design/site/css/all.css')}}" >
    <link rel="stylesheet" type="text/css"  href="{{url('design/site/css/jquery-ui.min.css')}}" >
    <link rel="stylesheet" type="text/css"  href="{{url('design/site/css/jquery-ui.theme.min.css')}}" >
    <!-- libraries -->
    <link rel="stylesheet" type="text/css" href="{{url('design/site/css/bootstrap-select.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('design/site/css/sweetalert2.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('design/site/css/lightslider.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('design/site/css/wickedpicker.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('design/site/css/jpreview.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('design/site/css/magnific-popup.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/plugins/extensions/toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/vendors/css/extensions/toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/vendors/css/dropify/dropify.min.css')}}">
    <!-- style -->
    <link rel="stylesheet" type="text/css" href="{{url('design/site/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('design/site/css/media.css')}}" />
    <!-- END: Styles CSS-->

    @yield('page_css')

    @yield('main_css')
</head>
