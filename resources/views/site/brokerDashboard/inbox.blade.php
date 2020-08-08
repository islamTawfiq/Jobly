@extends('site.layout.dashboard')
@section('content')
    <main>

        @include('site.components.dashboard.topMain', ['pageName' => 'My Notification'])

        <div class="myNotifications">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="brokerNoti text-center text-lg-left">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <span class="waitingStatus"></span>
                                        <span class="ml-4 noti">The Admin Sent You $ 80</span>
                                    </div>
                                    <div class="col-lg-6 text-lg-right">
                                        <span class="history">December 18th, 2019 - 12:00 PM</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="brokerNoti text-center text-lg-left">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <span class="waitingStatus"></span>
                                        <span class="ml-4 noti">The Admin Sent You $ 80</span>
                                    </div>
                                    <div class="col-lg-6 text-lg-right">
                                        <span class="history">December 18th, 2019 - 12:00 PM</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="brokerNoti text-center text-lg-left">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <span class="font-weight-bold">System Sent you a message</span>
                                    </div>
                                    <div class="col-lg-6 text-lg-right">
                                        <span class="history">December 18th, 2019 - 12:00 PM</span>
                                    </div>
                                    <div class="col-12">
                                        <p class="mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Corporis cupiditate iusto explicabo harum minus ullam vero libero, eos velit
                                            sequi repellendus accusamus nobis voluptatum in assumenda ipsum modi! Sunt
                                            voluptatem doloremque reprehenderit, soluta repellendus, pariatur iure autem
                                            rem recusandae tempora, officia quaerat aperiam voluptate modi suscipit
                                            excepturi repudiandae obcaecati cumque.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-12">
                        <div class="brokerNoti text-center text-lg-left">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <span class="font-weight-bold">System Sent you an attachment</span>
                                    </div>
                                    <div class="col-lg-6 text-lg-right">
                                        <span class="history">December 18th, 2019 - 12:00 PM</span>
                                    </div>
                                    <div class="col-12">
                                        <div class="idImage mt-4">
                                            <img src="images/africa5.jpeg" alt="id">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>


    </main>
@stop
