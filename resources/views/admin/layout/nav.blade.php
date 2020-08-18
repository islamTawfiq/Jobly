<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu   navbar-shadow
{{request()->cookie('navbar_type') == 'navbar-hidden' ? 'd-none' : ''}}
{{request()->cookie('navbar_type') == 'navbar-static' ? 'navbar-static-top' : ''}}
{{request()->cookie('navbar_type') == 'navbar-floating' ? 'floating-nav' : ''}}
{{request()->cookie('navbar_type') == 'navbar-sticky' ? 'fixed-top' : ''}}
{{request()->cookie('navbar_color')}}
{{request()->cookie('theme_layout') == '' ? 'navbar-light' : 'navbar-dark'}}"
>
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a
                                class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                    class="ficon feather icon-menu"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav bookmark-icons">
                        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{url('')}}"
                                                                  data-toggle="tooltip" data-placement="top"
                                                                  title="View Site"><i
                                    class="ficon feather icon-globe"></i></a></li>
                        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{url('')}}"
                                                                  data-toggle="tooltip" data-placement="top"
                                                                  title="Home"><i
                                    class="ficon feather icon-home"></i></a></li>
                        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{url('admin/settings')}}"
                                                                  data-toggle="tooltip" data-placement="top"
                                                                  title="Settings"><i
                                    class="ficon feather icon-settings"></i></a></li>

                        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{url('admin/admins')}}"
                                                                  data-toggle="tooltip" data-placement="top"
                                                                  title="Admins"><i class="ficon fa fa-user-secret"></i></a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i
                                    class="ficon feather icon-star warning"></i></a>
                            <div class="bookmark-input search-input">
                                {{--                                <div class="bookmark-input-icon"><i class="feather icon-search primary"></i></div>--}}
                                {{--                                <input class="form-control input" type="text" placeholder="Search..." tabindex="0" data-search="template-list">--}}
                                <ul class="search-list search-list-bookmark"></ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <ul class="nav navbar-nav float-right">
                    <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i
                                class="ficon feather icon-maximize"></i></a></li>
                    <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i
                                class="ficon feather icon-search"></i></a>
                        <div class="search-input">
                            <div class="search-input-icon"><i class="feather icon-search primary"></i></div>
                            <input class="input" type="text" placeholder="Search..." tabindex="-1"
                                   data-search="template-list">
                            <div class="search-input-close"><i class="feather icon-x"></i></div>
                            <ul class="search-list search-list-main"></ul>
                        </div>
                    </li>

                    <li class="dropdown dropdown-notification nav-item">
                        <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                            <i class="ficon feather icon-bell"></i>
                            <span class="badge badge-pill badge-primary badge-up">
                                {{ count(auth()->user()->unreadNotifications) }}
                            </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <div class="dropdown-header m-0 p-2">
                                    <h3 class="white">{{ count(auth()->user()->unreadNotifications) }}</h3>
                                    <span class="notification-title">New Notifications</span>
                                </div>
                            </li>
                            <li class="media-list" style="overflow-y: auto">
                                @foreach (auth()->user()->notifications as $notify)
                                @if ($notify->type == 'App\Notifications\NewMessage')
                                <a class="d-flex justify-content-between {{ $notify->read_at == null ? 'readAt' : '' }}" href="{{ url('/admin/new-message') . '/' . $notify->data['data'] }}">
                                    <div class="media d-flex align-items-start">
                                        <div class="media-left">
                                            <i class="feather icon-plus-square font-medium-5 primary"></i>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="primary media-heading">You have new order!</h6>
                                            <small class="notification-text"> {{ $notify->data['contain'] }}</small>
                                        </div>
                                        <small>
                                            <time class="media-meta"><i class="fas fa-clock"></i> {{ $notify->created_at->diffForHumans() }}</time>
                                            <?php $notify->markAsRead() ?>
                                        </small>
                                    </div>
                                </a>
                                @else
                                <a class="d-flex justify-content-between {{ $notify->read_at == null ? 'readAt' : '' }}" href="{{ url('/admin/new-notification') . '/' . $notify->data['data'] }}">
                                    <div class="media d-flex align-items-start">
                                        <div class="media-left">
                                            <i class="feather icon-plus-square font-medium-5 primary"></i>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="primary media-heading">You have new order!</h6>
                                            <small class="notification-text"> {{ $notify->data['contain'] }}</small>
                                        </div>
                                        <small>
                                            <time class="media-meta"><i class="fas fa-clock"></i> {{ $notify->created_at->diffForHumans() }}</time>
                                            <?php $notify->markAsRead() ?>
                                        </small>
                                    </div>
                                </a>
                                @endif
                                @endforeach
                            </li>
                            <li class="dropdown-menu-footer">
                                <a class="dropdown-item p-1 text-center" href="javascript:void(0)">Read all notifications</a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link"
                                                                   href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">Admin</span><span
                                    class="user-status">{{ auth()->user()->name }}</span></div>
                            <span><img class="round" src="{{url('design/admin/img/avatar.png')}}" alt="avatar" height="40" width="40"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{url('admin/user/edit')}}"><i class="feather icon-user"></i>Edit Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{url('/logout')}}"><i class="feather icon-power"></i>Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<ul class="main-search-list-defaultlist-other-list d-none">
    <li class="auto-suggestion d-flex align-items-center justify-content-between cursor-pointer"><a
            class="d-flex align-items-center justify-content-between w-100 py-50">
            <div class="d-flex justify-content-start"><span class="mr-75 feather icon-alert-circle"></span><span>No results found.</span>
            </div>
        </a></li>
</ul>
