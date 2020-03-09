@foreach ($items as $item)
    <div class="card-filter active-border pb-1">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters ">
                <div class="col-md-4">
                    <img class="img-fluid card-img" src="{{$item->salon_main_image}}" alt="" style="max-height:196px;"/>
                </div>
                <div class="col-md-8">
                    <div class="card-body row ml-2 pt-1 pb-0" >
                        <h5 class="card-title col-9 title-styl pl-0">{{$item->salon_name}} </h5> 
                        <span class="col-3 text-right position-relative">
                            <img src="{{url('design/site/images/1554739182-Pay_Online.png')}}" class="img-pay" alt="">
                            <img class="pay-right" src="{{url('design\site\images\11-512.png')}}" alt="">

                        </span>
                        <span class="display-block">18 عمارات الضباط زهراء </span>
                        <div class="display-block"><h6>مدينه نصر</h6></div>
                        <div class="show-rate">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                        </div>
                        <div class="display-block">
                            <p class="card-text"> {{$item->salon_description}} <a href="{{url('/salon-details').'/'.$item->id}}" class=" read-more icon-color">اقرأ المزيد >> </a> </p>
                        </div>
                    </div>
                </div>
                <p class="card-text col-6 pt-2 mb-0"><small class="text-black-50"><i class="far fa-clock"></i> Last updated 3 mins ago</small></p>
                <p class="col-6 text-right pt-2 pl-5 mb-0 price-font">
                    <i class="far fa-money-bill-alt"></i> 300 LE
                </p>
            </div>
        </div>
    </div>

@endforeach
