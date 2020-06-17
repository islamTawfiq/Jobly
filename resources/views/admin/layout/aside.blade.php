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
            @include('admin.components.navItems.singleitem', ['url' => url('admin'),'name'=>trans('web.home'),'icon'=>'feather icon-home'])
            @if (auth()->User()->group_id->settings_show == 1)
            @include('admin.components.navItems.singleitem', ['url' => url('admin/settings'),'name'=>trans('web.settings'),'icon'=>'feather icon-settings'])
            @endif
            @if (auth()->User()->group_id->skills_show == 1)
            @include('admin.components.navItems.singleitem', ['url' => url('admin/skills'),'name'=>trans('skills'),'icon'=>'feather icon-circle'])
            @endif
            @if (auth()->User()->group_id->nannies_show == 1)
            @include('admin.components.navItems.singleitem', ['url' => url('admin/nannies'),'name'=>trans('nannies'),'icon'=>'feather icon-circle'])
            @endif
            @if (auth()->User()->group_id->agencies_show == 1 || auth()->User()->group_id->brokers_show == 1 )
            <li class=" navigation-header"><span>{{trans('web.users')}}</span></li>
                    @include('admin.components.navItems.multiitem', ['url' => 'javascript:void(0)','name'=>'All Users','icon'=>'feather icon-users','items'=>[
                  [
                  'name'=>'Agencies',
                  'icon'=>'feather icon-circle',
                  'url'=>url('admin/agencies'),
                  ],[
                  'name'=>'Brokers',
                  'icon'=>'feather icon-circle',
                  'url'=>url('admin/brokers'),
                  ]
                  ]])
            @endif
            @if (auth()->User()->group_id->admins_show == 1 || auth()->User()->group_id->admin_groups_show == 1)
            @include('admin.components.navItems.multiitem', ['url' => 'javascript:void(0)','name'=>trans('web.admins'),'icon'=>'feather icon-user-check','items'=>[
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
                @include('admin.components.navItems.multiitem', ['url' => 'javascript:void(0)','name'=>trans('pages'),'icon'=>'feather icon-user-check','items'=>[
                              [
                              'name'=>trans('web.aboutUs'),
                              'icon'=>'feather icon-circle',
                              'url'=>url('admin/about-us'),
                              ],[
                              'name'=>trans('web.contactUs'),
                              'icon'=>'feather icon-circle',
                              'url'=>url('admin/contact-us'),
                              ],[
                              'name'=>trans('web.terms'),
                              'icon'=>'feather icon-circle',
                              'url'=>url('admin/terms&conditions'),
                              ]
                              ]])
            @endif



            {{--  @if (auth()->User()->group_id->icons_show == 1)
                <li class=" navigation-header"><span>{{trans('web.uiElements')}}</span></li>
            @include('admin.components.navItems.multiitem', ['url' => 'javascript:void(0)','name'=>'Icons','icon'=>'feather icon-eye','items'=>[
            [
            'name'=>trans('web.featherIcons'),
            'icon'=>'feather icon-circle',
            'url'=>url('admin/icons-feather'),
            ],[
            'name'=>trans('web.fontAwesome'),
            'icon'=>'feather icon-circle',
            'url'=>url('admin/icons-font-awesome'),
            ],
            ]])
            @endif
        </ul>  --}}
    </div>
</div>
