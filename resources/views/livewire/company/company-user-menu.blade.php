<div>
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->
        <form
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                       aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                     aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                   placeholder="Search for..." aria-label="Search"
                                   aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            <!-- Nav Item - Alerts -->
           <li class="nav-item dropdown no-arrow mx-1">
               <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <i class="fas fa-bell fa-fw"></i>
                   <!-- Counter - Alerts -->
                   <span class="badge badge-danger badge-counter">
                        {{ $user->unreadNotifications->count() }}
                   </span>
               </a>

               <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="alertsDropdown">
                   <h6 class="dropdown-header">
                       {{ __('Alerts Center') }}
                   </h6>
                   @forelse ($user->unreadNotifications as $notification)
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                            <div class="icon-circle bg-light">
                                {{-- <i class="fas fa-file-alt text-white"></i> --}}
                                <img src="{{ asset('asset/img/for4.png') }}" alt="" class="rounded-pill w-100 h-100" >
                            </div>
                        </div>
                        <div>
                            <span class="font-weight-bold">{{ $notification->data['title'] }}</span>
                            <div class="small text-gray-500">{{ $notification->data['user_created'] }} </div>
                            <div class="small text-gray-500"> {{Carbon\Carbon::parse($notification->created_at)->format('Y-m-d') }}</div>
                        </div>
                    </a>

                   @empty
                    {{-- <a href="" class="dropdown-item d-flex align-items-center text-center">{{ __('No Data') }}</a> --}}
                   @endforelse
                   <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>



                </div>
            </li>


            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    @if (LaravelLocalization::getCurrentLocale() == 'ar')
                    <a class="nav-link dropdown-toggl" href="#" id="navbarDropdown"
                       role="button" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                       {{-- <i class="fas fa-globe-africa"></i> AR --}}
                        <img src="{{asset('asset/img/flags/sa.png')}}" class="rounded-circle" style="width: 30px; height: 30px;" alt="">
                    </a>
                    @else
                        <a class="nav-link dropdown-toggl" href="#" id="navbarDropdown"
                           role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                      {{-- <i class="fas fa-globe-americas"></i> EN --}}
                            <img src="{{asset('asset/img/flags/gb.png')}}"  class="rounded-circle" style="width: 30px; height: 30px;" alt="">
                        </a>
                    @endif
                    <div class="dropdown-menu dropdown-menu-right animated--grow-in"
                         aria-labelledby="navbarDropdown">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            @if ($localeCode == 'en')
                                <a class="dropdown-item {{LaravelLocalization::getCurrentLocale() == 'en' ? 'active' : ''}}" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
    {{--                                <i class="fas fa-globe-americas"></i>--}}
                                    <img src="{{asset('asset/img/flags/gb.png')}}"  class="rounded-circle" style="width: 30px; height: 30px;" alt="">
                                    {{ $properties['native'] }}
                                </a>
                            @else
                                <a class="dropdown-item {{LaravelLocalization::getCurrentLocale() == 'ar' ? 'active' : ''}}" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
    {{--                                <i class="fas fa-globe-africa"></i>--}}
                                    <img src="{{asset('asset/img/flags/sa.png')}}"  class="rounded-circle" style="width: 30px; height: 30px;" alt="">
                                    {{ $properties['native'] }}
                                </a>
                            @endif
                        @endforeach
                    </div>
                </li>
            </ul>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->


            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{auth()->user()->email}}</span>
                    @if(auth()->user()->logo == null)
                        <img class="img-profile rounded-circle" src="{{asset('asset/admin/img/undraw_profile.svg')}}">
                    @else
                        <img class="img-profile rounded-circle" src="{{ asset('storage/'.auth()->user()->logo) }}">
        {{--            {{dd()}}--}}
                    @endif
                </a>

                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                     aria-labelledby="userDropdown">
                    <a class="dropdown-item {{request()->routeIs('company.profile') ? 'active' :''}}" href="{{route('company.profile')}}">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        {{__('t.profile')}}
                    </a>
        {{--            <a class="dropdown-item" href="#">--}}
        {{--                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>--}}
        {{--                Settings--}}
        {{--            </a>--}}
        {{--            <a class="dropdown-item" href="#">--}}
        {{--                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>--}}
        {{--                Activity Log--}}
        {{--            </a>--}}
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        {{__('Logout')}}
                    </a>
                </div>
            </li>

        </ul>

    </nav>

</div>
