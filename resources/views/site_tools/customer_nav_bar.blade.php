<style>

    .dm {
        direction: ltr;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
        border: none;
        padding: 0.7em;
        text-align: center;
    }
    @media only screen and (min-width: 992px) {
        .dropdown:hover .dm {
            display: flex;
        }
        .dm.show {
            display: flex;
        }
    }
    .dm ul {
        list-style: none;
        padding: 0;
    }
    .dm li .dropdown-item {
        color: gray;
        font-size: 1em;
        padding: 0.5em 1em;
    }
    .dropdown-menu li .dropdown-item:hover {
        background-color: #f1f1f1;
    }
    .dropdown-menu li:first-child a {
        font-weight: bold;
        font-size: 1.2em;
        text-transform: uppercase;
        color: #516beb;
    }
    .dm li:first-child a:hover {
        background-color: #f1f1f1;
    }
    @media only screen and (max-width: 992px) {
        .dm.show {
            flex-wrap: wrap;
            max-height: 350px;
            overflow-y: scroll;
        }
    }
    @media only screen and (min-width: 992px) and (max-width: 1140px) {
        .dropdown:hover .dm {
            width: 40vw;
            flex-wrap: wrap;
        }
    }
</style>
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
                    <a href="{{ route('site.home') }}" class="nav-item nav-link active"><i class="fa-solid fa-house"></i> {{ trans('t.home') }}</a>
                    @livewire('order-cart')
                    @livewire('user-order-notification')
                    {{--                    <a href="" class="nav-item nav-link">{{ __('All Categories') }}</a>--}}
{{--                    <a href="portfolio.html" class="nav-item nav-link">Project</a>--}}

                    {{--Start Mega menu--}}
{{--                    <div class="nav-item dropdown">--}}
{{--                        <a  class="nav-link dropdown-toggl avatar" data-toggle="dropdown"> {{__('t.service')}}</a>--}}

{{--                        <div class="dropdown-menu dm">--}}
{{--                            <?php--}}
{{--                            use App\Models\categories;$categories = categories::with('child')->where('parent_id',null)->get();--}}
{{--                            ?>--}}
{{--                                @foreach($categories as $val)--}}
{{--                                    @if($val->status == 1)--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="" class="dropdown-item">{{$val->name}}</a></li>--}}
{{--                                            @if($val->child)--}}
{{--                                                @foreach($val->child as $child_val)--}}
{{--                                                    @if($child_val->status == 1)--}}
{{--                                                        <li><a href="" class="dropdown-item" style="font-size: small">{{$child_val->name}}</a></li>--}}
{{--                                                    @endif--}}
{{--                                                @endforeach--}}
{{--                                            @endif--}}
{{--                                        </ul>--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}



{{--                        </div>--}}
{{--                    </div>--}}
                    {{--End Mega menu--}}



                    <div class="nav-item dropdown">

                        @if (LaravelLocalization::getCurrentLocale() == 'ar')
                            <a href="#" class="nav-link dropdown-toggl active " data-toggle="dropdown">
                                <img src="{{asset('asset/img/flags/sa.png')}}"  class="rounded-circle" style="width: 25px; height: 25px;" alt="">
                            </a>
                        @else
                            <a href="#" class="nav-link dropdown-toggl active" data-toggle="dropdown">
                                <img src="{{asset('asset/img/flags/gb.png')}}"  class="rounded-circle" style="width: 25px; height: 25px;" alt=""></a>
                        @endif

                        <div class="dropdown-menu text-center">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                @if ($localeCode == 'en')
                                    <a class="dropdown-item {{LaravelLocalization::getCurrentLocale() == 'en' ? 'active' : ''}}" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        <img src="{{asset('asset/img/flags/gb.png')}}"  class="rounded-circle" style="width: 25px; height: 25px;" alt=""> {{ $properties['native'] }}
                                    </a>
                                @else
                                    <a class="dropdown-item {{LaravelLocalization::getCurrentLocale() == 'ar' ? 'active' : ''}}" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        <img src="{{asset('asset/img/flags/sa.png')}}"  class="rounded-circle" style="width: 25px; height: 25px;" alt=""> {{ $properties['native'] }}
                                    </a>
                                @endif

                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="mr-right">


                    @guest('web')
{{--                            <a class="btn btn-success" href="{{ route('register') }}">{{ trans('t.register') }} <i class="fa-solid fa-user-plus"></i></a>--}}
                            <a class="btn btn-primary" href="{{ route('login') }}">{{ trans('t.signin') }} <i class="fa-solid fa-arrow-right-to-bracket"></i></a>
                     @else
                                @livewire('user-menu')
                    @endguest
                </div>
            </div>
        </nav>
    </div>
</div>
