@extends('site.layout.dashboard')
@section('content')
    <main>

        @include('site.components.dashboard.topMain', ['pageName' => 'Important Instruction'])

        <div class="myOrder">
            <div class="container">
                <div class="terms">
                        <h4 class="mb-4">Important instruction & information: </h4>
                        <p></p>
                </div>
             </div>
        </div>

    </main>
@stop
