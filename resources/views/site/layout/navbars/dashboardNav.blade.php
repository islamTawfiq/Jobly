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
                <div class="dropdown d-inline-block ">
                    <ul id="myNoty">
                        <li id="notification_li">
                            <a href="#" id="notificationLink" style="color: #fff">
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
                                    <a class="dropdown-item {{ $notify->read_at == null ? 'readAt' : '' }} " href="{{ url('/new-message') . '/' . $notify->data['data'] }}">
                                        {{ $notify->data['contain'] }} <br> <span class="created_at"><i class="fas fa-clock"></i> {{ $notify->created_at->diffForHumans() }}</span>
                                        <?php $notify->markAsRead() ?>
                                    </a>
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
