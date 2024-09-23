<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="asset/img/logo.png" alt=""> -->
        <h1 class="sitename">{{ __('For Engineers')}}</h1> <span>.</span>
      </a>
      <nav id="navmenu" class="navmenu">
        <ul>
            {{-- @dd(app()->getLocale()); --}}
          <li><a href="/" class="{{ request()->is(app()->getLocale()) ? 'active' : '' }}">{{ __('t.home') }}</a></li>
          <li><a href="{{ route('site.about') }}" class="{{ request()->is(app()->getLocale().'/about') ? 'active' : '' }}">{{ __('About') }}</a></li>
          {{-- <li><a href="">{{ __('Services') }}</a></li> --}}
          <li><a href="projects.html">{{ __('Service Providers') }}</a></li>
          <li><a href="{{ route('site.blog') }}">{{ __('Blogs') }}</a></li>
          <li><a href="contact.html">{{ __('t.contact') }}</a></li>
          @if (LaravelLocalization::getCurrentLocale() == 'ar')
          <li><a class="" hreflang="{{ "en" }}" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
            <img src="{{asset('asset/img/flags/sa.png')}}"  class="rounded-circle" style="width: 30px; height: 30px;" alt="">
            {{ "العربية " }}
        </a></li>
        @else
        <li><a class="" hreflang="{{ "ar" }}" href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">
            <img src="{{asset('asset/img/flags/gb.png')}}"  class="rounded-circle" style="width: 30px; height: 30px;" alt="">
            {{ "English " }}
        </a></li>
        @endif
          {{-- <li class="dropdown" >

            @if (LaravelLocalization::getCurrentLocale() == 'ar')
            <a>
                <img src="{{asset('asset/img/flags/sa.png')}}"  class="rounded-circle" style="width: 25px; height: 25px;" alt="">
            </a>
            @else
            <a >
                <img src="{{asset('asset/img/flags/gb.png')}}"  class="rounded-circle" style="width: 25px; height: 25px;" alt="">
            </a>
            @endif
            <ul>
              @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    @if ($localeCode == 'en')

                    <li><a class="active" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        <img src="{{asset('asset/img/flags/gb.png')}}"  class="rounded-circle" style="width: 30px; height: 30px;" alt="">
                        {{ $properties['native'] }}
                    </a></li>
                    @else
                    <li><a class="active" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        <img src="{{asset('asset/img/flags/sa.png')}}"  class="rounded-circle" style="width: 30px; height: 30px;" alt="">
                        {{ $properties['native'] }}
                    </a></li>
                    @endif
            @endforeach
            </ul>
          </li> --}}
        @guest
        <li><a href="{{ route('login') }}" class="">{{ __('Log In') }}</a></li>
        <li><a href="{{ route('register') }}" class="">{{ __('Register') }}</a></li>
        @else
        <li class="dropdown text-secondary"><a href="#">
            @livewire('admin-orders')
            <img src="{{ asset('asset/img/for4.png') }}" class="rounded-circle" style="width: 25px; height: 25px;" alt=""> &nbsp;
            <span class="text-capitalize">{{ Auth::user()->name }}</span>
             <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="{{ route('user.dashboard') }}">{{ __('Dashboard') }}</a></li>
              <li><a href="{{ route('user.profile') }}">{{ __('Profile') }}</a></li>
              <li>
                <a href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}<i class="material-icons">logout</i>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </a>

              </li>
            </ul>
          </li>
        @endguest
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-view-list"></i>
      </nav>

    </div>
  </header>
