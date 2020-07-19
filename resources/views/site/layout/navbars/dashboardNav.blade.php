<header id="topNavbarInDashboard">
    <div class="container">
        <div class="row">
            <div class="col-10">
                <div class="logo">
                    <img src="{{$settings->main_logo}}" alt="logo"/>
                    @if (auth()->user()->user_type_id == 2)
                    <span> | <strong>Broker Dashboard</strong></span>
                    @elseif (auth()->user()->user_type_id == 3)
                    <span> | <strong>Import Agency Dashboard</strong></span>
                    @elseif (auth()->user()->user_type_id == 4)
                    <span> | <strong>Sponsor Dashboard</strong></span>
                    @elseif (auth()->user()->user_type_id == 5)
                    <span> | <strong>Export Agency Dashboard</strong></span>
                    @endif

                </div>
            </div>
            <div class="col-2 topRightMenu  dashboardHead">
                <div class="sign ml-lg-auto">
                    <div class="dropdown">
                        <i class="fas fa-user-circle"></i>
                        <a class="dropdown-toggle" href="#" role="button" id="signUp" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <div class="dropdown-menu mySignUpDrop" aria-labelledby="signUp">
                            <a class="dropdown-item" href="{{url('/')}}">Home</a>
                            <a class="dropdown-item" href="{{url('/logout')}}">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
