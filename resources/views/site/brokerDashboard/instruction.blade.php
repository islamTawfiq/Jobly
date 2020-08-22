@extends('site.layout.dashboard')
@section('content')
    <main>

        @include('site.components.dashboard.topMain', ['pageName' => 'Important Instruction'])


        <div class="termsAndCondition">
            <div class="container">
                <div class="terms">
                    <p class="h5 mb-3">{!! $item->title !!}</p>
                    <p>{!! $item->body !!}</p>
                </div>
            </div>
        </div>

    </main>
@stop


