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
            class="{{ url()->current() == url('/broker-dashboard/edit-profile') ? 'active' : '' }}">Edit Profile</a>
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
             class="{{ url()->current() == url('/broker-dashboard/client-orders') ? 'active' : '' }}">Client Orders</a>
        </li>
        <li>
            <a href="{{url('/broker-dashboard/my-payments')}}"
             class="{{ url()->current() == url('/broker-dashboard/my-payments') ? 'active' : '' }}">My Payments</a>
        </li>
        <li style="font-size: 14px">
            <a href="{{url('/broker-dashboard/my-notification')}}"
             class="{{ url()->current() == url('/broker-dashboard/my-notification') ? 'active' : '' }}">My Notification/Inbox</a>
             <span class="badge badge-danger">{{ count(auth()->user()->unreadNotifications) }}</span>
            </li>
        <li class="text-center">
            <a href="{{url('/broker-dashboard/instructions')}}"
             class="{{ url()->current() == url('/broker-dashboard/instructions') ? 'active' : '' }}">Important instruction before you start posting you must read
             <br><i class="fas fa-file-pdf" style="color: #f00; font-size: 35px;"></i>
            </a>
        </li>

    @endif
    @if (auth()->user()->user_type_id == 5)
        <li>
            <a href="{{url('/export-agency-dashboard/edit-profile')}}"
            class="{{ url()->current() == url('/export-agency-dashboard/edit-profile') ? 'active' : '' }}">Edit Profile</a>
        </li>
        <li>
            <a href="{{url('/export-agency-dashboard/all-cvs')}}"
             class="{{ url()->current() == url('/export-agency-dashboard/all-cvs') ? 'active' : '' }}">All Cvs</a>
        </li>
        <li>
            <a href="{{ url('/export-agency-dashboard/add-cv') }}"
             class="{{ url()->current() == url('/export-agency-dashboard/add-cv') ? 'active' : '' }}">Add Cv</a>
        </li>
        <li>
            <a href="{{url('/export-agency-dashboard/my-cv')}}"
             class="{{ url()->current() == url('/export-agency-dashboard/my-cv') ? 'active' : '' }}">My Cvs Status
            </a>
        </li>
        <li>
            <a href="{{url('/export-agency-dashboard/client-orders')}}"
             class="{{ url()->current() == url('/export-agency-dashboard/client-orders') ? 'active' : '' }}">Client Orders
            </a>
        </li>
        <li style="font-size: 14px">
            <a href="{{url('/export-agency-dashboard/my-notification')}}"
             class="{{ url()->current() == url('/export-agency-dashboard/my-notification') ? 'active' : '' }}">My Notification/Inbox</a>
             <span class="badge badge-danger">{{ count(auth()->user()->unreadNotifications) }}</span>
            </li>
        <li class="text-center">
            <a href="{{url('/export-agency-dashboard/instructions')}}"
             class="{{ url()->current() == url('/export-agency-dashboard/instructions') ? 'active' : '' }}">Important instruction before you start posting you must read
             <br><i class="fas fa-file-pdf" style="color: #f00; font-size: 35px;"></i>
            </a>
        </li>
    @endif
    {{-- Agency --}}
    @if (auth()->user()->user_type_id == 3)
        <li>
            <a href="{{ url('/import-agency-dashboard/edit-profile') }}"
            class="{{ url()->current() == url('/import-agency-dashboard/edit-profile') ? 'active' : '' }}">Edit Profile </a>
        </li>
        <li>
            <a href="{{ url('/import-agency-dashboard/my-orders') }}"
            class="{{ url()->current() == url('/import-agency-dashboard/my-orders') ? 'active' : '' }}">My Orders </a>
        </li>
        <li>
            <a href="{{ url('/import-agency-dashboard/my-package') }}"
            class="{{ url()->current() == url('/import-agency-dashboard/my-package') ? 'active' : '' }}">My Package </a>
        </li>
        <li>
            <a href="{{ url('/import-agency-dashboard/my-payments') }}"
            class="{{ url()->current() == url('/import-agency-dashboard/my-payments') ? 'active' : '' }}">My Payments </a>
        </li>
        <li style="font-size: 14px;">
            <a href="{{url('/import-agency-dashboard/my-notification')}}"
             class="{{ url()->current() == url('/import-agency-dashboard/my-notification') ? 'active' : '' }}">My Notification/Inbox</a>
             <span class="badge badge-danger">{{ count(auth()->user()->unreadNotifications) }}</span>
        </li>
    @endif
    {{-- Sponsor --}}
    @if (auth()->user()->user_type_id == 4)
    <li>
        <a href="{{ url('/sponsor-dashboard/edit-profile') }}"
        class="{{ url()->current() == url('/sponsor-dashboard/edit-profile') ? 'active' : '' }}">Edit Profile </a>
    </li>
    <li>
        <a href="{{ url('/sponsor-dashboard/my-orders') }}"
        class="{{ url()->current() == url('/sponsor-dashboard/my-orders') ? 'active' : '' }}">My Orders </a>
    </li>
    <li>
        <a href="{{ url('/sponsor-dashboard/my-package') }}"
        class="{{ url()->current() == url('/sponsor-dashboard/my-package') ? 'active' : '' }}">My Package </a>
    </li>
    <li>
        <a href="{{ url('/sponsor-dashboard/my-payments') }}"
        class="{{ url()->current() == url('/sponsor-dashboard/my-payments') ? 'active' : '' }}">My Payments </a>
    </li>
    <li style="font-size: 14px;">
        <a href="{{url('/sponsor-dashboard/my-notification')}}"
         class="{{ url()->current() == url('/sponsor-dashboard/my-notification') ? 'active' : '' }}">My Notification/Inbox</a>
         <span class="badge badge-danger">{{ count(auth()->user()->unreadNotifications) }}</span>
    </li>
    <li>
        <a href="{{url('/sponsor-dashboard/instructions')}}"
         class="{{ url()->current() == url('/sponsor-dashboard/instructions') ? 'active' : '' }}">Important instruction before you start posting you must read
         <br><i class="fas fa-file-pdf" style="color: #f00; font-size: 35px;"></i>
        </a>
    </li>
    @endif
    </ul>

</div>
