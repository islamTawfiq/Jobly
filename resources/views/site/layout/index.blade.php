@php
    $settings = \App\Model\Settings::first();
@endphp
    <!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr" >
@include('site.layout.header', ['settings' => $settings])
<body class="overFlow">

    @if(url('/') == url()->current())
    @include('site.layout.navbars.homeNav', ['settings' => $settings])
    @elseif(url('/verify') == url()->current())
    @else
    @include('site.layout.navbars.mainNav', ['settings' => $settings])
    @endif

    @yield('content')
    @if(url('/verify') == url()->current())
    @include('site.layout.scripts')
    @else
    @include('site.layout.footer', ['settings' => $settings])
    @endif

</body>
</html>
