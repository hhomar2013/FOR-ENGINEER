<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    {{-- <form
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
    </form> --}}

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item "><a class="nav-link" href="{{ route('site.index') }}">{{ __('Go Home') }}</a></li>
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

    @livewire('admin-notifications')

        <!-- Nav Item - Messages -->
{{--        <li class="nav-item dropdown no-arrow mx-1">--}}
{{--            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"--}}
{{--               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                <i class="fas fa-envelope fa-fw"></i>--}}
{{--                <!-- Counter - Messages -->--}}
{{--                <span class="badge badge-danger badge-counter">7</span>--}}
{{--            </a>--}}
{{--            <!-- Dropdown - Messages -->--}}
{{--            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"--}}
{{--                 aria-labelledby="messagesDropdown">--}}
{{--                <h6 class="dropdown-header">--}}
{{--                    Message Center--}}
{{--                </h6>--}}
{{--                <a class="dropdown-item d-flex align-items-center" href="#">--}}
{{--                    <div class="dropdown-list-image mr-3">--}}
{{--                        <img class="rounded-circle" src="img/undraw_profile_1.svg"--}}
{{--                             alt="...">--}}
{{--                        <div class="status-indicator bg-success"></div>--}}
{{--                    </div>--}}
{{--                    <div class="font-weight-bold">--}}
{{--                        <div class="text-truncate">Hi there! I am wondering if you can help me with a--}}
{{--                            problem I've been having.</div>--}}
{{--                        <div class="small text-gray-500">Emily Fowler · 58m</div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--                <a class="dropdown-item d-flex align-items-center" href="#">--}}
{{--                    <div class="dropdown-list-image mr-3">--}}
{{--                        <img class="rounded-circle" src="img/undraw_profile_2.svg"--}}
{{--                             alt="...">--}}
{{--                        <div class="status-indicator"></div>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <div class="text-truncate">I have the photos that you ordered last month, how--}}
{{--                            would you like them sent to you?</div>--}}
{{--                        <div class="small text-gray-500">Jae Chun · 1d</div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--                <a class="dropdown-item d-flex align-items-center" href="#">--}}
{{--                    <div class="dropdown-list-image mr-3">--}}
{{--                        <img class="rounded-circle" src="img/undraw_profile_3.svg"--}}
{{--                             alt="...">--}}
{{--                        <div class="status-indicator bg-warning"></div>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <div class="text-truncate">Last month's report looks great, I am very happy with--}}
{{--                            the progress so far, keep up the good work!</div>--}}
{{--                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--                <a class="dropdown-item d-flex align-items-center" href="#">--}}
{{--                    <div class="dropdown-list-image mr-3">--}}
{{--                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"--}}
{{--                             alt="...">--}}
{{--                        <div class="status-indicator bg-success"></div>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone--}}
{{--                            told me that people say this to all dogs, even if they aren't good...</div>--}}
{{--                        <div class="small text-gray-500">Chicken the Dog · 2w</div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>--}}
{{--            </div>--}}
{{--        </li>--}}

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                @if (LaravelLocalization::getCurrentLocale() == 'ar')
                <a class="nav-link dropdown-toggl" href="#" id="navbarDropdown"
                   role="button" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
{{--                    <i class="fas fa-globe-africa"></i> AR--}}
                    <img src="{{asset('asset/img/flags/sa.png')}}"  class="rounded-circle" style="width: 30px; height: 30px;" alt="">
                </a>
                @else
                    <a class="nav-link dropdown-toggl" href="#" id="navbarDropdown"
                       role="button" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
{{--                        <i class="fas fa-globe-americas"></i> EN--}}
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

        @livewire('admin-user')
    </ul>

</nav>
