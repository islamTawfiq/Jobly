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
                @foreach (\App\Model\Link::get() as $link)
                <li class="nav-item active"><a href="{{url('/')}}" class="nav-link">{{ $link->home }}</a></li>
                <li class="nav-item"><a href="{{url('/filter')}}" class="nav-link">{{ $link->domestic_workers }}</a></li>
                <li class="nav-item"><a href="#" class="nav-link">{{ $link->local_domestic_workers }}</a></li>
                <li class="nav-item"><a href="{{url('/about-us')}}" class="nav-link">{{ $link->about }}</a></li>
                <li class="nav-item"><a href="{{url('/contact-us')}}" class="nav-link">{{ $link->contact }}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </nav>
</div>
<div class="col-lg-3 topRightMenu">
    <div class="sign ml-lg-auto">
        @auth
            <div class="dropdown d-inline-block ">
                <ul id="myNoty">
                    <li id="notification_li">
                        <a href="#" id="notificationLink">
                            <div class="button">
                                <i class="fas fa-bell"></i>
                                <span class="button__badge">{{ count(auth()->user()->unreadNotifications) }}</span>
                            </div>
                            <a href="" role="button" id="notify" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        </a>
                        </a>
                        <div id="notificationContainer">
                            <div id="notificationTitle">Notifications</div>
                            <div id="notificationsBody" class="notifications">
                            @foreach (auth()->user()->notifications as $notify)
                                @if ($notify->type == 'App\Notifications\NewMessage')
                                    @if ( $notify->data['sender'] == 1)
                                    <a class="dropdown-item {{ $notify->read_at == null ? 'readAt' : '' }} " href="{{ url('/new-message') . '/' . $notify->data['data'] }}">
                                        <span>System send you new message</span> <br> <span class="created_at"><i class="fas fa-clock"></i> {{ $notify->created_at->diffForHumans() }}</span>
                                        <?php $notify->markAsRead() ?>
                                    </a>
                                    @else
                                    <a class="dropdown-item {{ $notify->read_at == null ? 'readAt' : '' }} " href="{{ url('/new-message') . '/' . $notify->data['data'] }}">
                                        {{ $notify->data['contain'] }} <br> <span class="created_at"><i class="fas fa-clock"></i> {{ $notify->created_at->diffForHumans() }}</span>
                                        <?php $notify->markAsRead() ?>
                                    </a>
                                    @endif
                                @else
                                <a class="dropdown-item {{ $notify->read_at == null ? 'readAt' : '' }} " href="{{ url('/new-notification') . '/' . $notify->data['data'] }}">
                                    {{ $notify->data['contain'] }} <br> <span class="created_at"><i class="fas fa-clock"></i> {{ $notify->created_at->diffForHumans() }}</span>
                                    <?php $notify->markAsRead() ?>
                                </a>
                                @endif
                            @endforeach
                            </div>
                            @if(count(auth()->user()->notifications) == 0)
                            <div id="notificationsBody" class="notifications m-5">
                                <img style="width: 100px" src="{{ url('design/site/images/noNotify.png') }}" alt="logo"/>
                                <a>There are no notifications yet</a>
                            </div>
                            @endif
                            {{-- <div id="notificationFooter"><a href="#">See All</a></div> --}}
                        </div>
                    </li>
                </ul>
            </div>
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
                    <a class="dropdown-item" href="{{url('/broker-dashboard/my-cv')}}">Dashboard</a>
                    @endif
                    @if ( auth()->user()->user_type_id == 3 )
                    <a class="dropdown-item" href="{{url('/import-agency-dashboard/edit-profile')}}">Dashboard</a>
                    @endif
                    @if ( auth()->user()->user_type_id == 4 )
                    <a class="dropdown-item" href="{{url('/sponsor-dashboard/edit-profile')}}">Dashboard</a>
                    @endif
                    @if ( auth()->user()->user_type_id == 5 )
                    <a class="dropdown-item" href="{{url('/export-agency-dashboard/edit-profile')}}">Dashboard</a>
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
                    <a class="dropdown-item" href="{{ url('/broker-register') }}">{{ $link->sourcing_broker }}</a>
                    <a class="dropdown-item" href="{{ url('/export-agency-register') }}">{{ $link->sourcing_agency }}</a>
                    <a class="dropdown-item" href="{{ url('/import-agency-register') }}">{{ $link->recruitment_agency }}</a>
                    <a class="dropdown-item" href="{{ url('/sponsor-register') }}">{{ $link->sponsorship }}</a>
                </div>
            </div>
        @endguest

    </div>
</div>
