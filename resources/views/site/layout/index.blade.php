{{-- @php
    $settings = \App\Model\Settings::first();
    $homeBackground = \App\Model\HomeBackground::first();
@endphp --}}
@php
    $settings = \App\Model\Settings::first();
@endphp
    <!DOCTYPE html>
<html class="loading" lang="{{session('lang') == 'en' ? 'en' : 'ar'}}" data-textdirection="{{session('lang') == 'en' ? 'ltr' : 'rtl'}}" >
@include('site.layout.header', ['settings' => $settings])
<body class="overFlow">
{{-- @include('site.layout.nav', ['settings' => $settings,'homeBackground'=>$homeBackground]) --}}

@if(url('/') == url()->current())
@include('site.layout.navbars.homeNav', ['settings' => $settings])
@else
@include('site.layout.navbars.mainNav', ['settings' => $settings])
@endif

@yield('content')
@include('site.layout.footer', ['settings' => $settings])
</body>
</html>
