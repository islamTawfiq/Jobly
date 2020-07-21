@extends('site.layout.dashboard')
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

