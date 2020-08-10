@extends('site.layout.dashboard')
@section('content')
    <main>

        @include('site.components.dashboard.topMain', ['pageName' => 'My Payments'])

        <!-- myPayments -->
        <div class="myPayments">
            <div class="container">
                <div class="row">
                    <div class="col-12" style="margin-bottom: 280px">
                        <div class="paymentsHistory">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>$ 0 Payment for free package subscription</p>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <span>December 18th, 2019 - 12:00 PM</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </main>
@stop
