@extends('site.layout.index')
@section('content')
    <main>


        <!-- start countNannyProfile -->
        <div class="countNannyProfile">
            <div class="afterBack">
                <div class="countText">
                    <p>About Us</p>
                </div>
            </div>
        </div>
    
        <!-- aboutAfricanNannies -->
        <div class="aboutAfricanNannies text-center">
            <div class="container">
                <p class="h3">African Nannies</p>
                <p class="aboutAfricanNanniesText"></p>
                <div class="whoWeAre">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div class="slideWho">
                                    <ul class="vertical">
                                        <li data-thumb="{{ url('storage' . $item->img1) }}">
                                            <img src="{{ url('storage' . $item->img1) }}" />
                                        </li>
                                        <li data-thumb="{{ url('storage' . $item->img2) }}">
                                            <img src="{{ url('storage' . $item->img2) }}" />
                                        </li>
                                        <li data-thumb="{{ url('storage' . $item->img3) }}">
                                            <img src="{{ url('storage' . $item->img3) }}" />
                                        </li>
                                        <li data-thumb="{{ url('storage' . $item->img4) }}">
                                            <img src="{{ url('storage' . $item->img4) }}" />
                                        </li>
                                      
                                     
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        
    </main>
@stop
