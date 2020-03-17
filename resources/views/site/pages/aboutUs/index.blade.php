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
                <p class="h3">{!! $item->title !!}</p>
                <p class="aboutAfricanNanniesText">{!! $item->body !!}</p>
                <div class="whoWeAre">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div class="slideWho">
                                    <ul class="vertical">
                                        
                                        {{-- @if (!empty($item->img1)) --}}
                                        <li data-thumb="{{ $item->first_image }}">
                                            <img src="{{ $item->first_image }}" />
                                        </li>            
                                        {{-- @endif --}}
                                        {{-- @if (!empty($item->img2)) --}}
                                        <li data-thumb="{{ $item->second_image }}">
                                            <img src="{{ $item->second_image }}" />
                                        </li>            
                                        {{-- @endif --}}
                                        {{-- @if (!empty($item->img3)) --}}
                                        <li data-thumb="{{ $item->third_image }}">
                                            <img src="{{ $item->third_image }}" />
                                        </li>            
                                        {{-- @endif --}}
                                        {{-- @if (!empty($item->img4)) --}}
                                        <li data-thumb="{{ $item->fourth_image }}">
                                            <img src="{{ $item->fourth_image }}" />
                                        </li>            
                                        {{-- @endif --}}
                                        
                                                               
                                     
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
