
@php
    $settings = \App\Model\Settings::first();
@endphp
    <!DOCTYPE html>
<html class="loading" lang="{{session('lang') == 'en' ? 'en' : 'ar'}}" data-textdirection="{{session('lang') == 'en' ? 'ltr' : 'rtl'}}" >
@include('site.layout.header', ['settings' => $settings])
<body class="overFlow">

@include('site.layout.navbars.dashboardNav', ['settings' => $settings])
@include('site.layout.navbars.sideMenu')

<div id="main">

    @yield('content')

    @include('site.layout.dashboardFooter', ['settings' => $settings])

</div>

</body>
</html>
