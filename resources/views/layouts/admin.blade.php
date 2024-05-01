<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | {{ $title }}</title>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    {{-- <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">--}}

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
</head>
<style>
    body{
        font-family: 'Cairo', sans-serif;
    }
</style>
<body >
    <div id="app" >
        <nav class="navbar navbar-expand-md navbar-light bg-warning shadow-sm">
            <div class="container">
{{--                <a class="navbar-brand" href="{{ url('/') }}">--}}
{{--                    {{ config('app.name', 'Laravel') }}--}}
{{--                </a>--}}
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <a href="/admin"><img src="{{asset('asset/img/logo2.png')}}" style="width: 60px;height: 60px;" alt=""></a>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item dropdown">

                            <div class="dropdown">
                                @if (LaravelLocalization::getCurrentLocale() == 'ar')
                                <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-language"></i> AR</a>
                                @else
                                <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-language"></i> EN</a>
                                @endif

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    @if ($localeCode == 'en')
                                    <li>
                                        <a class="dropdown-item " rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            <i class="fas fa-globe-americas"></i> {{ $properties['native'] }}
                                        </a>
                                    </li>
                                    @else
                                    <li>
                                        <a class="dropdown-item " rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            <i class="fas fa-globe-africa"></i> {{ $properties['native'] }}
                                        </a>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                              </div>
                            </div>


                            <div class="dropdown">
                                <a class="btn" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">{{auth()->user()->name}}</a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a href="" class="dropdown-item"><i class="fa-solid fa-user"></i> {{__('t.profile')}}</a>
                                    <a href="" class="dropdown-item"
                                       href="{{ route('admin.logout') }}"
                                       onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();"
                                    ><i class="fa fa-power-off"></i> {{__('t.signout')}}</a>

                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                            </div>
                        </div>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>



        <main class="py-4">
            @yield('content')
        </main>
    </div>
{{--jS--}}
        <script src="{{asset("asset/admin/js/sweetalert2@11.js")}}"></script>

        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
                });

        </script>

    @livewireScripts
</body>
</html>
