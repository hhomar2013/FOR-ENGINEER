<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | {{ $title }}</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    {{-- <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}

{{--    <link rel="stylesheet" href="{{ asset('asset/site/app-6bbc4f6b.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('asset/site/app-29170f3c.css.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('asset/site/bootstrap.min.css') }}">--}}
    <!-- Scripts -->
{{--     @vite(['resources/sass/app.scss', 'resources/js/app.js'])--}}
{{--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">--}}
    <link rel="stylesheet" href="{{asset('asset/site/bootstrap.min.css')}}">

</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600&display=swap');
    body{
        font-family: 'Cairo', sans-serif;
        background-image: url({{ asset('asset/img/logo2.png') }});
        background-repeat: no-repeat;
        background-position-x: center;
    }

    .login-card{
        margin-top:230px;padding: 30px;
    }

    @media (max-width: 767px) {
    body{
        background-image: url({{ asset('asset/img/logo2.png') }});
        background-repeat: no-repeat;
        background-position-x: center;
        background-size: 200px 200px;
    }

    .login-card{
        margin-top:100px;padding: 30px;
    }



}
</style>
<body class="bg-dark text-white">
    <div id="app" >
        <nav class="navbar navbar-expand-md">
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

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item dropdown">

{{--                            <div class="dropdown">--}}
{{--                                @if (LaravelLocalization::getCurrentLocale() == 'ar')--}}
{{--                                <a class="btn dropdown-toggle text-white" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-language"></i> AR</a>--}}
{{--                                @else--}}
{{--                                <a class="btn dropdown-toggle text-white" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-language"></i> EN</a>--}}
{{--                                @endif--}}

{{--                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">--}}
{{--                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)--}}
{{--                                    @if ($localeCode == 'en')--}}
{{--                                    <li>--}}
{{--                                        <a class="dropdown-item " rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">--}}
{{--                                            <i class="fas fa-globe-americas"></i> {{ $properties['native'] }}--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    @else--}}
{{--                                    <li>--}}
{{--                                        <a class="dropdown-item " rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">--}}
{{--                                            <i class="fas fa-globe-africa"></i> {{ $properties['native'] }}--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    @endif--}}
{{--                                    @endforeach--}}
{{--                                </ul>--}}
{{--                              </div>--}}
{{--                            </div>--}}


                        </li>
                    </ul>
                </div>
            </div>
        </nav>



        <main class="py-4">
            @yield('content')
        </main>
    </div>

{{--    <script src="{{ asset('asset/site/app-6d844737.js') }}"></script>--}}
{{--    <script src="{{asset('asset/site/bootstrap.bundle.min.js')}}"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>--}}

{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>--}}

    <script src="{{asset('asset/site/bootstrap.bundle.min.js')}}"></script>

</body>
</html>
