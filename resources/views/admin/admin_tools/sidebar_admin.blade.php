<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin/dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-toolbox"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{config('app.name')}}<sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ (request()->is(app()->getLocale() .'/admin/dashboard') ? 'active' : '')  }}">
        <a class="nav-link " href="/admin/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{__('t.dashboard')}}</span></a>
    </li>

       <!-- Heading -->
       <li class="nav-item {{request()->routeIs('admin.ct') ?'active' :''}}">
           @livewire('admin-orders')
       </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading"> <i class="fas fa-fw fa-cog"></i> {{__('t.setting')}}</div>
    <li class="nav-item {{request()->routeIs('admin.ct') ?'active' :''}}">
        <a class="nav-link" href="{{route('admin.ct')}}">
            <i class="fa fa-building"></i>
            <span> {{__('Company Types')}}</span>
        </a>
    </li>
    <li class="nav-item {{request()->routeIs('admin.categories') ?'active' :''}}">
        <a class="nav-link" href="{{route('admin.categories')}}">
            <i class="fa fa-list"></i>
            <span> {{__('Categories')}}</span>
        </a>
    </li>

    <li class="nav-item {{request()->routeIs('admin.service-price') ?'active' :''}}">
        <a class="nav-link" href="{{route('admin.service-price')}}">
            <i class="fa fa-list"></i>
            <span> {{__('Service Prices')}}</span>
        </a>
    </li>

    <li class="nav-item {{request()->routeIs('admin.CareersType') ?'active' :''}}">
        <a class="nav-link" href="{{route('admin.CareersType')}}">
            <i class="fa fa-list"></i>
            <span> {{__('Career Type')}}</span>
        </a>
    </li>

    <li class="nav-item {{request()->routeIs('admin.users') ?'active' :''}}">
        <a class="nav-link {{request()->routeIs('admin.users') ?'text-warning' :''}}" href="{{route('admin.users')}}">
            <i class="fa fa-list"></i>
            <span> {{__('users')}}</span>
        </a>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
{{--    <li class="nav-item {{request()->is(app()->getLocale() .'/admin/*') ? 'active' : '' }}">--}}
{{--        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"--}}
{{--           aria-expanded="true" aria-controls="collapseTwo">--}}
{{--            <i class="fas fa-fw fa-cog"></i>--}}
{{--            <span>{{__('t.setting')}}</span>--}}
{{--        </a>--}}
{{--        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">--}}
{{--            <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                <h6 class="collapse-header">Custom Components:</h6>--}}
{{--                <a class="collapse-item" href="{{route('admin.ct')}}"><i class="fa fa-building"></i> {{__('Company Types')}}</a>--}}
{{--                <a class="collapse-item" href="cards.html">Cards</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </li>--}}

    <!-- Nav Item - Utilities Collapse Menu -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        <i class="fas fa-fw fa-cog"></i>  {{__('Management')}}
    </div>


    <li class="nav-item {{request()->routeIs('admin.spa') ?'active' :''}}">
        <a class="nav-link " href="{{route('admin.spa')}}">
            <i class="fas fa-list"></i>
            <span>{{__('t.reservation')}}</span></a>
    </li>

    <li class="nav-item {{request()->routeIs('admin.ContactMessageList') ?'active' :''}}">
        <a class="nav-link" href="{{route('admin.ContactMessageList')}}">
            <i class="fas fa-list"></i>
            <span>{{__('inquiries')}}</span></a>
    </li>

    <li class="nav-item {{request()->routeIs('admin.CareerRequest') ? 'active' :''}}">
        <a class="nav-link " href="{{route('admin.CareerRequest')}}">
            <i class="fas fa-list"></i>
            <span>{{__('Career Request')}}</span></a>
    </li>


    <li class="nav-item">
        <a class="nav-link {{request()->routeIs(['admin.payments','admin.companiesAccountant']) ?'' :'collapsed'}}" href="#" data-toggle="collapse" data-target="#collapseUtilities"
           aria-expanded="true" aria-controls="collapseUtilities">
           <i class="fa fa-money-bill-alt"></i>
            <span>{{__('Accounting')}}</span>
        </a>
        <div id="collapseUtilities" class="collapse {{request()->routeIs(['admin.payments','admin.companiesAccountant']) ?'show' :''}}" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
{{--                <h6 class="collapse-header">Custom Utilities:</h6>--}}
                <a class="collapse-item {{request()->routeIs('admin.companiesAccountant') ?'active' :''}}" href="{{route('admin.companiesAccountant')}}">{{__('Companies')}}</a>
                <a class="collapse-item {{request()->routeIs('admin.payments') ?'active' :''}}" href="{{route('admin.payments',['id'=>1])}}">{{__('Payments') . "(Moyasar   )"}}</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li>


    <!-- Nav Item - Pages Collapse Menu -->
{{--    <li class="nav-item">--}}
{{--        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"--}}
{{--           aria-controls="collapsePages">--}}
{{--            <i class="fas fa-fw fa-folder"></i>--}}
{{--            <span>Pages</span>--}}
{{--        </a>--}}
{{--        <div id="collapsePages" class="collapse " aria-labelledby="headingPages"--}}
{{--             data-parent="#accordionSidebar">--}}
{{--            <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                <h6 class="collapse-header">Login Screens:</h6>--}}
{{--                <a class="collapse-item" href="login.html">Login</a>--}}
{{--                <a class="collapse-item" href="register.html">Register</a>--}}
{{--                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>--}}
{{--                <div class="collapse-divider"></div>--}}
{{--                <h6 class="collapse-header">Other Pages:</h6>--}}
{{--                <a class="collapse-item" href="404.html">404 Page</a>--}}
{{--                <a class="collapse-item " href="blank.html">Blank Page</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </li>--}}

    <!-- Nav Item - Charts -->


    <!-- Nav Item - Tables -->


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>


