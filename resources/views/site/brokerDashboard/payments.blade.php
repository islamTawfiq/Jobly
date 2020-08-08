@extends('site.layout.dashboard')
@section('content')
    <main>

        @include('site.components.dashboard.topMain', ['pageName' => 'My Payments'])

        <div class="myPayments">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="paymentsHistory">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>You received $ 29 from the admin</p>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <span>December 18th, 2019 - 12:00 PM</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="paymentsHistory">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>You received $ 29 from the admin</p>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <span>December 18th, 2019 - 12:00 PM</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <table class="table table-striped table-bordered text-center mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">Required Ammount</th>
                                    <th scope="col">Comment/Date</th>
                                    <th scope="col">Paid Ammount</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"></th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row"></th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row"></th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row"></th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row"></th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </main>
@stop
