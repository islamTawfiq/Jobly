<div class="col-lg-9">
    <nav class="navbar navbar-expand-lg navbar-light" id="ftco-navbar">
        <a class="navbar-brand" href="{{url('/')}}">
            <img src="{{$settings->main_logo}}" alt="logo"/>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav m-auto">
                <li class="nav-item active"><a href="{{url('/')}}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{url('/filter')}}" class="nav-link">Nannies</a></li>
                <li class="nav-item"><a href="#" class="nav-link">How it Works</a></li>
                <li class="nav-item"><a href="{{url('/about-us')}}" class="nav-link">About</a></li>
                <li class="nav-item"><a href="{{url('/contact-us')}}" class="nav-link">Contact us/inquiry</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<div class="col-lg-3 topRightMenu">
    <div class="sign ml-lg-auto">
        <a href="{{url('login')}}" class="">Sign In</a>
        <div class="dropdown show d-inline-block">
            <a class="btn btn-primary" href="" role="button" id="signUp" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Sign Up <i class="fas fa-caret-down"></i>
            </a>

            <div class="dropdown-menu mySignUpDrop" aria-labelledby="signUp">
                <a class="dropdown-item" href="sponsorRegistration.html">Sign up as Sponsor</a>
                <a class="dropdown-item" href="{{url('broker-register')}}">Sign up as Broker</a>
                <a class="dropdown-item" href="agencyRegistration.html">Sign up as Agency</a>
            </div>
        </div>
    </div>
</div>
