@extends('site.layout.dashboard')
@section('page_js')
<script>
    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal.fire({
            title: "are u sure delete?",
            type: "error",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger waves-effect waves-light',
            confirmButtonText: "Delete",
            cancelButtonText: "Cancel",
            closeOnConfirm: true,
            closeOnCancel: true
        }).then(function(result) {
            if (result.value === true) {
                window.location.href = url;
            }
        });
    });

</script>
@stop
@section('content')
    <main>

        @include('site.components.dashboard.topMain', ['pageName' => 'All Cvs'])


        <div class="myPayments">
            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        {{-- card --}}
                        @include('site.components.card.cv')
                        {{-- end card --}}
                    </div>
                </div>
            </div>
        </div>

    </main>
@stop

