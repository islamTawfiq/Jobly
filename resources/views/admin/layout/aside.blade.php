<div class="main-menu menu-fixed menu-accordion menu-shadow  {{request()->cookie('theme_layout') == '' ? 'menu-light' : 'menu-dark'}}" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{url('/')}}">
                    <div class="brand-logo" style="background: url('{{$settings->main_logo}}') no-repeat; width:120px; height:120px"></div>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            @include('admin.components.navItems.singleitem', ['url' => url('admin'),'name'=>'Home','icon'=>'feather icon-home'])

            @if (auth()->User()->group_id->settings_show == 1)
            @include('admin.components.navItems.singleitem', ['url' => url('admin/settings'),'name'=>'Settings','icon'=>'feather icon-settings'])
            @endif

            @if (auth()->User()->group_id->skills_show == 1)
            @include('admin.components.navItems.singleitem', ['url' => url('admin/skills'),'name'=>'Skills','icon'=>'feather icon-circle'])
            @endif

            @if (auth()->User()->group_id->skills_show == 1)
            @include('admin.components.navItems.singleitem', ['url' => url('admin/jobs'),'name'=>'Jobs','icon'=>'feather icon-circle'])
            @endif

            @if (auth()->User()->group_id->skills_show == 1)
            @include('admin.components.navItems.singleitem', ['url' => url('admin/countries'),'name'=>'Exporting Countries','icon'=>'feather icon-circle'])
            @endif

            @if (auth()->User()->group_id->skills_show == 1)
            @include('admin.components.navItems.singleitem', ['url' => url('admin/importing-countries'),'name'=>'Importing Countries','icon'=>'feather icon-circle'])
            @endif

            @if (auth()->User()->group_id->nannies_show == 1)
            @include('admin.components.navItems.singleitem', ['url' => url('admin/reservations'),'name'=>'Reservations','icon'=>'feather icon-circle'])
            @endif

            @if (auth()->User()->group_id->nannies_show == 1)
            @include('admin.components.navItems.singleitem', ['url' => url('admin/nannies'),'name'=>'Nannies','icon'=>'feather icon-circle'])
            @endif

            @if (auth()->User()->group_id->agencies_show == 1 || auth()->User()->group_id->brokers_show == 1 )
            <li class=" navigation-header"><span>Users</span></li>
            @include('admin.components.navItems.multiitem', ['url' => 'javascript:void(0)','name'=>'All Users','icon'=>'feather icon-users','items'=>[
                [
                'name'=>'Export Agencies',
                'icon'=>'feather icon-circle',
                'url'=>url('admin/export-agencies'),
                ],[
                'name'=>'Import Agencies',
                'icon'=>'feather icon-circle',
                'url'=>url('admin/import-agencies'),
                ],[
                'name'=>'Brokers',
                'icon'=>'feather icon-circle',
                'url'=>url('admin/brokers'),
                ],[
                'name'=>'Sponsors',
                'icon'=>'feather icon-circle',
                'url'=>url('admin/sponsors'),
                ]
            ]])
            @endif

            @if (auth()->User()->group_id->admins_show == 1 || auth()->User()->group_id->admin_groups_show == 1)
            @include('admin.components.navItems.multiitem', ['url' => 'javascript:void(0)','name'=>'Admins','icon'=>'feather icon-user-check','items'=>[
                [
                'name'=>'List Admins',
                'icon'=>'feather icon-circle',
                'url'=>url('admin/admins'),
                ],[
                'name'=>'Admin Groups',
                'icon'=>'feather icon-circle',
                'url'=>url('admin/admin-groups'),
                ],
                ]])
            @endif

            @if (auth()->User()->group_id->about_show == 1 || auth()->User()->group_id->contact_show == 1 || auth()->User()->group_id->terms_show == 1)
            @include('admin.components.navItems.multiitem', ['url' => 'javascript:void(0)','name'=>'Pages','icon'=>'feather icon-user-check','items'=>[
                [
                'name'=>'About Us',
                'icon'=>'feather icon-circle',
                'url'=>url('admin/about-us'),
                ],[
                'name'=>'Contact Us',
                'icon'=>'feather icon-circle',
                'url'=>url('admin/contact-us'),
                ],[
                'name'=>'Terms And Conditions',
                'icon'=>'feather icon-circle',
                'url'=>url('admin/terms&conditions'),
                ]
                ]])
            @endif

        </ul>
    </div>
</div>
