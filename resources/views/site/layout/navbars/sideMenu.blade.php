<span class="openSideMenu">
    <i class="fas fa-bars"></i>
</span>

<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn">&times;</a>
    <ul>
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
        <li><a href="">Client Orders</a></li>
        <li><a href="">My Notifications/Inbox</a> <span
                class="badge badge-danger">4</span></li>
        <li><a href="">My Payments</a></li>
        <li><a href="">My Documents</a></li>
    @endif
    @if (auth()->user()->user_type_id == 3)
        <li>
            <a href="{{ url('/agency-dashboard/edit-profile') }}"
            class="{{ url()->current() == url('/agency-dashboard/edit-profile') ? 'active' : '' }}">MyProfile </a>
        </li>
        <li>
            <a href="{{ url('/agency-dashboard/my-orders') }}"
            class="{{ url()->current() == url('/agency-dashboard/my-orders') ? 'active' : '' }}">My Orders </a>
        </li>
        <li><a href="agencyDashboardMyPackage.html">My Package</a></li>
        <li><a href="agencyDashboardMyNotifications.html">My Notifications/Inbox</a> <span
                class="badge badge-danger">4</span></li>
        <li><a href="agencyDashboardMyPayments.html">My Payments</a></li>
        <li><a href="agencyDashboardMyDocuments.html">My Documents</a></li>
    @endif
    </ul>

</div>
