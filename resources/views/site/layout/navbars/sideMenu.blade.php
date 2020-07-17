<span class="openSideMenu">
    <i class="fas fa-bars"></i>
</span>

<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn">&times;</a>
    <ul>
        {{-- Broker --}}
    @if (auth()->user()->user_type_id == 2)
        <li>
            <a href="{{url('/broker-dashboard/edit-profile')}}"
            class="{{ url()->current() == url('/broker-dashboard/edit-profile') ? 'active' : '' }}">My Profile
            </a>
        </li>
        <li>
            <a href="{{url('/broker-dashboard/all-cvs')}}"
             class="{{ url()->current() == url('/broker-dashboard/all-cvs') ? 'active' : '' }}">All Cvs</a>
        </li>
        <li>
            <a href="{{ url('/broker-dashboard/add-cv') }}"
             class="{{ url()->current() == url('/broker-dashboard/add-cv') ? 'active' : '' }}">Add Cv</a>
        </li>
        <li>
            <a href="{{url('/broker-dashboard/my-cv')}}"
             class="{{ url()->current() == url('/broker-dashboard/my-cv') ? 'active' : '' }}">My Cvs Status
            </a>
        </li>
        <li>
            <a href="{{url('/broker-dashboard/client-orders')}}"
             class="{{ url()->current() == url('/broker-dashboard/client-orders') ? 'active' : '' }}">Client Orders
            </a>
        </li>
        <li>
            <a href="{{url('/broker-dashboard/interviews')}}"
             class="{{ url()->current() == url('/broker-dashboard/interviews') ? 'active' : '' }}">My Interviews
            </a>
        </li>
    @endif
    {{-- Agency --}}
    @if (auth()->user()->user_type_id == 3)
        <li>
            <a href="{{ url('/agency-dashboard/edit-profile') }}"
            class="{{ url()->current() == url('/agency-dashboard/edit-profile') ? 'active' : '' }}">MyProfile </a>
        </li>
        <li>
            <a href="{{ url('/agency-dashboard/my-orders') }}"
            class="{{ url()->current() == url('/agency-dashboard/my-orders') ? 'active' : '' }}">My Orders </a>
        </li>
        <li>
            <a href="{{ url('/agency-dashboard/interviews') }}"
            class="{{ url()->current() == url('/agency-dashboard/interviews') ? 'active' : '' }}">My Interviews </a>
        </li>
    @endif
    {{-- Sponsor --}}
    @if (auth()->user()->user_type_id == 4)
    <li>
        <a href="{{ url('/sponsor-dashboard/edit-profile') }}"
        class="{{ url()->current() == url('/sponsor-dashboard/edit-profile') ? 'active' : '' }}">MyProfile </a>
    </li>
    <li>
        <a href="{{ url('/sponsor-dashboard/my-orders') }}"
        class="{{ url()->current() == url('/sponsor-dashboard/my-orders') ? 'active' : '' }}">My Orders </a>
    </li>
    @endif
    </ul>

</div>
