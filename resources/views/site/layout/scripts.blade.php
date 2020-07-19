<!-- BEGIN: Scripts JS-->
    <script src="{{url('design/site/js/jquery.js')}}"></script>
    <script src="{{url('design/site/js/jquery-ui.min.js')}}"></script>
    <script src="{{url('design/site/js/popper.min.js')}}"></script>
    <script src="{{url('design/site/js/bootstrap.min.js')}}"></script>
    <!-- libraries -->
    <script src="{{url('design/site/js/bootstrap-select.min.js')}}"></script>
    <script src="{{url('design/site/js/sweetalert2.all.min.js')}}"></script>
    <script src="{{url('design/site/js/lightslider.js')}}"></script>
    <script src="{{url('design/site/js/wickedpicker.min.js')}}"></script>
    <script src="{{url('design/site/js/jpreview.js')}}"></script>
    <script src="{{url('design/site/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{url('design/admin/vendors/js/extensions/toastr.min.js')}}"></script>
    <script src="{{url('design/admin/vendors/js/dropify/dropify.min.js')}}"></script>
    <!-- plug -->
    <script src="{{url('design/site/js/plug.js')}}"></script>
<!-- End Scripts JS-->
@yield('page_js')
{{-- <script src="{{url('design/admin/js/edit.js')}}"></script> --}}
@include('site.layout.scripts.index')
<!-- END: inputs JS-->
@yield('main_js')
