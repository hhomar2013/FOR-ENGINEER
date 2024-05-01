<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    @livewire('company-side-bard')
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ (request()->is(app()->getLocale() .'/company/dashboard') ? 'active' : '')  }}">
        <a class="nav-link " href="/company/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{__('t.dashboard')}}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading"> <i class="fa fa-flag"></i> {{__('t.Main')}}</div>
    <li class="nav-item {{request()->routeIs('company.orders') ?'active' :''}}">
        <a class="nav-link" href="{{route('company.orders')}}">
            <i class="fa fa-list"></i>
            <span> {{__('Daily Orders')}}</span>
        </a>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->

    <hr class="sidebar-divider">

    <!-- Nav Item - Tables -->
    <div class="sidebar-heading"> <i class="fa fa-cogs"></i> {{__('t.setting')}}</div>
    <li class="nav-item {{request()->routeIs('company.services') ?'active' :''}}">
        <a class="nav-link" href="{{route('company.services')}}">
            <i class="fa fa-list"></i>
            <span>{{__('Your Services')}}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>


