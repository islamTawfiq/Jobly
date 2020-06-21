@extends('site.layout.index')
@section('content')
    <main>
        <div class="row justify-content-center">
            <div class="col-md-5 m-5">
                <div class="card">
                    <div class="card-header">{{ __('Please Verify Code From Your Moible Number To Active Account') }}</div>

                    <div class="card-body">
                        <form class="d-inline" method="POST" action="{{ url('/verify') }}">
                            @csrf
                            @include('site.components.inputs.text', [
                                'name' => 'code',
                                'id' => '',
                                'type' => 'text',
                                'class' => '',
                                'value' =>  '',
                                'label' => '* Code',
                                'placeholder' => 'Enter Your Code',
                                ])
                            <button type="submit" class="btn btn-primary">Verify</button>.
                        </form>
                    </div>

                    <div class="card-footer">
                        <a href="#">Request New Code</a>
                        @include('site.components.inputs.text', [
                            'name' => 'phone',
                            'id' => '',
                            'type' => 'hidden',
                            'class' => '',
                            'value' =>  '{{ request()->phone }}',
                            'label' => '',
                            'placeholder' => '',
                            ])
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop
