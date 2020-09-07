<header id="topNavbarInDashboard">
    <div class="container">
        <div class="row">
            <div class="col-10">
                <div class="logo">
                    <img src="{{$settings->main_logo}}" alt="logo"/>
                    @if (auth()->user()->user_type_id == 2)
                    <span> | <strong>Sub-agent Dashboard</strong></span>
                    @elseif (auth()->user()->user_type_id == 3)
                    <span> | <strong>Reqruitment Agency Dashboard</strong></span>
                    @elseif (auth()->user()->user_type_id == 4)
                    <span> | <strong>Sponsor Dashboard</strong></span>
                    @elseif (auth()->user()->user_type_id == 5)
                    <span> | <strong>Sourcing Agency Dashboard</strong></span>
                    @endif

                </div>
            </div>
            <div class="col-2 topRightMenu  dashboardHead">
                <div class="dropdown d-inline-block ntf">
                    <ul id="myNoty">
                        <li id="notification_li">
                            <a href="javascript:void(0)" id="notificationLink" style="color: #fff">
                                <div class="button">
                                    <i class="fas fa-bell"></i>
                                    <span class="button__badge">{{ count(auth()->user()->unreadNotifications) }}</span>
                                </div>
                                <a href="" role="button" id="notify" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            </a>
                            </a>
                            <div id="notificationContainer">
                                <div id="notificationTitle">Notifications
                                    <a href="javascript:void(0)" class="d-md-none text-dark float-right closebtn">×</a>
                                </div>
                                <div id="notificationsBody" class="notifications">
                                @foreach (auth()->user()->unreadNotifications as $notify)
                                @if ($notify->type == 'App\Notifications\NewMessage')
                                    @if ( $notify->data['sender'] == 1)
                                    <a class="dropdown-item" href="{{ url('/new-message') . '/' . $notify->id . '/' . $notify->data['data'] }}">
                                        <span>System send you new message</span> <br> <span class="created_at"><i class="fas fa-clock"></i> {{ $notify->created_at->diffForHumans() }}</span>
                                    </a>
                                    @else
                                    <a class="dropdown-item" href="{{ url('/new-message') . '/' . $notify->id . '/' . $notify->data['data'] }}">
                                        {{ $notify->data['contain'] }} <br> <span class="created_at"><i class="fas fa-clock"></i> {{ $notify->created_at->diffForHumans() }}</span>
                                    </a>
                                    @endif
                                @else
                                <a class="dropdown-item" href="{{ url('/new-notification') . '/' . $notify->id . '/' . $notify->data['data'] }}">
                                    {{ $notify->data['contain'] }} <br> <span class="created_at"><i class="fas fa-clock"></i> {{ $notify->created_at->diffForHumans() }}</span>
                                </a>
                                @endif
                                @endforeach
                                </div>
                                @if(count(auth()->user()->unreadNotifications) == 0)
                                <div id="notificationsBody" class="notifications m-5 text-center">
                                    <img style="width: 100px" src="{{ url('design/site/images/no-notifications.png') }}" alt="logo"/>
                                </div>
                                @endif
                            </div>
                        </li>
                    </ul>
                </div>
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
