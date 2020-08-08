<div class="col-lg-9">
    <nav class="navbar navbar-expand-lg navbar-light" id="ftco-navbar">
        <a class="navbar-brand" href="{{url('/')}}">
            @if ( url()->current() == url('/') )
            <img src="{{ url('design/site/images/logo.png') }}" alt="logo"/>
            @else
            <img src="{{$settings->main_logo}}" alt="logo"/>
            @endif
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav m-auto">
                <li class="nav-item active"><a href="{{url('/')}}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{url('/filter')}}" class="nav-link">Domestic Workers</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Local Domestic Workers</a></li>
                <li class="nav-item"><a href="{{url('/about-us')}}" class="nav-link">About</a></li>
                <li class="nav-item"><a href="{{url('/contact-us')}}" class="nav-link">Contact us</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<div class="col-lg-3 topRightMenu">
    <div class="sign ml-lg-auto">
        @auth
            <div class="dropdown show d-inline-block">
                @if ( auth()->user()->status == 1 and auth()->user()->active == 1 )
                <a class="btn btn-primary" href="" role="button" id="signUp" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    {{ auth()->user()->name }} <i class="fas fa-caret-down"></i>
                </a>
                @else
                <a class="btn btn-primary">
                    Pending
                </a>
                @endif

                <div class="dropdown-menu mySignUpDrop" aria-labelledby="signUp">
                    @if ( auth()->user()->user_type_id == 1 )
                    <a class="dropdown-item" href="{{url('/admin')}}">Admin</a>
                    @endif
                    @if ( auth()->user()->user_type_id == 2 )
                    <a class="dropdown-item" href="{{url('/broker-dashboard/my-cv')}}">Broker Dashboard</a>
                    @endif
                    @if ( auth()->user()->user_type_id == 3 )
                    <a class="dropdown-item" href="{{url('/import-agency-dashboard/edit-profile')}}">Agency Dashboard</a>
                    @endif
                    @if ( auth()->user()->user_type_id == 4 )
                    <a class="dropdown-item" href="{{url('/sponsor-dashboard/edit-profile')}}">Sponsor Dashboard</a>
                    @endif
                    @if ( auth()->user()->user_type_id == 5 )
                    <a class="dropdown-item" href="{{url('/export-agency-dashboard/edit-profile')}}">Agency Dashboard</a>
                    @endif
                    <a class="dropdown-item" href="{{url('/logout')}}">Logout</a>
                </div>
            </div>
        @endauth
        @guest
            <a href="{{url('login')}}" class="">Sign In</a>
            <div class="dropdown show d-inline-block">
                <a class="btn btn-primary" href="" role="button" id="signUp" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Sign Up <i class="fas fa-caret-down"></i>
                </a>

                <div class="dropdown-menu mySignUpDrop" aria-labelledby="signUp">
                    <a class="dropdown-item" href="{{ url('/broker-register') }}">Sign up as workers sourcing broker</a>
                    <a class="dropdown-item" href="{{ url('/export-agency-register') }}">Sign up as workers sourcing agency</a>
                    <a class="dropdown-item" href="{{ url('/import-agency-register') }}">Sign up as reqruitment agency</a>
                    <a class="dropdown-item" href="{{ url('/sponsor-register') }}">Sign up as a family sponsorship</a>
                </div>
            </div>
        @endguest

    </div>
</div>
