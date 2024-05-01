<div class="nav-bar">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <a href="#" class="navbar-brand">
                @if (LaravelLocalization::getCurrentLocale() == 'ar')
                القائمة
                @else
                MENU
                @endif
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-right">
                    <a href="{{route('site.index')}}" class="nav-item nav-link {{ (request()->is(app()->getLocale()) ? 'active' : '')  }}"><i class="fa-solid fa-house"></i> {{ trans('t.home') }}</a>
{{--                    <a href="about.html" class="nav-item nav-link">{{ trans('t.about') }}</a>--}}
                    <a href="{{ route('site.home') }}" class="nav-item nav-link ">{{ trans('t.service') }}</a>

                    <a href="{{route('site.contact')}}" class="nav-item nav-link {{ (request()->is(app()->getLocale() .'/contact') ? 'active' : '')  }}">{{__('t.contact')}}</a>
                    <a href="{{route('site.careers')}}" class="nav-item nav-link {{ (request()->is(app()->getLocale() .'/careers') ? 'active' : '')  }}">{{__('Careers')}}</a>

                    <div class="nav-item dropdown">

                            @if (LaravelLocalization::getCurrentLocale() == 'ar')
                            <a href="#" class="nav-link  active avatar" data-toggle="dropdown">
{{--                                <i class="fa-solid fa-language"></i> AR--}}
                                <img src="{{asset('asset/img/flags/sa.png')}}"  class="rounded-circle" style="width: 25px; height: 25px;" alt="">
                            </a>
                            @else
                            <a href="#" class="nav-link  active" data-toggle="dropdown">
{{--                                <i class="fa-solid fa-language"></i> EN--}}
                                <img src="{{asset('asset/img/flags/gb.png')}}"  class="rounded-circle" style="width: 25px; height: 25px;" alt="">
                            </a>
                            @endif
                        <div class="dropdown-menu">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                @if ($localeCode == 'en')
                                <a class="dropdown-item " rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
{{--                                    <i class="fas fa-globe-americas"></i>--}}
                                    <img src="{{asset('asset/img/flags/gb.png')}}"  class="rounded-circle" style="width: 30px; height: 30px;" alt="">
                                    {{ $properties['native'] }}
                                </a>
                                @else
                                <a class="dropdown-item " rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
{{--                                    <i class="fas fa-globe-africa"></i> --}}
                                    <img src="{{asset('asset/img/flags/sa.png')}}"  class="rounded-circle" style="width: 30px; height: 30px;" alt="">
                                    {{ $properties['native'] }}
                                </a>
                                @endif


                        @endforeach
                        </div>
                    </div>

                </div>
                <div class="mr-right">
                    @guest('web')
                            <a class="btn btn-success" href="{{ route('register') }}">{{ trans('t.register') }} <i class="fa-solid fa-user-plus"></i></a>
                            <a class="btn btn-primary" href="{{ route('login') }}">{{ trans('t.signin') }} <i class="fa-solid fa-arrow-right-to-bracket"></i></a>
                     @else
                            @livewire('user-menu')
                    @endguest
                </div>
            </div>
        </nav>
    </div>
</div>
