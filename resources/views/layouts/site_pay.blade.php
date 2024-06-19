<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
    <head>
        <meta charset="utf-8">
        <title>{{ config('app.name') }} | {{ $title }}</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="{{ config('app.name') }}" name="keywords">
        <meta content="{{ config('app.name') }}" name="description">

        <!-- Favicon -->
        <link href="{{ asset('asset/img/for4.png') }}" rel="icon">
        <!-- Google Font -->
        {{-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> --}}
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- CSS Libraries -->
        <link href="{{ asset('asset/css/bootstrap.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css"  />
        <link href="{{ asset('asset/lib/animate/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('asset/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">


        <!-- Moyasar Styles -->
        <link rel="stylesheet" href="https://cdn.moyasar.com/mpf/1.7.3/moyasar.css" />
        <script src="https://cdn.moyasar.com/mpf/1.7.3/moyasar.js"></script>


        <!-- Moyasar Scripts -->
        <script src="https://polyfill.io/v3/polyfill.min.js?features=fetch"></script>

        <!-- Template Stylesheet -->
        @if(LaravelLocalization::getCurrentLocale() =='en') <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">  @else<link href="{{ asset('asset/css/style_rtl.css') }}" rel="stylesheet"> @endif
        @livewireStyles
        @yield('css')
    </head>

    <body>
        <div class="wrapper">
            <!-- Top Bar Start -->
{{--            @include('site_tools.top_bar')--}}
            <!-- Top Bar End -->

            <!-- Customer Nav Bar Start -->
{{--            @include('site_tools.customer_nav_bar')--}}
            <!-- Nav Bar End -->


            <!-- Content Start -->
            <div class="m-3">

                @yield('content')
            </div>

            <!-- Content end -->

            <!-- Footer Start -->
{{--            @include('site_tools.customer_footer')--}}
            <!-- Footer End -->

            <a href="#" class="back-to-top"><i class="fas fa-chevron-up"></i></a>
        </div>

        <!-- JavaScript Libraries -->

        <script src="{{ asset('asset/js/jquery-3.4.1.min.js') }}"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/js/all.min.js"></script> --}}
        <script src="{{ asset('asset/js/all.min.js') }}"></script>
        <script src="{{ asset('asset/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('asset/lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('asset/lib/wow/wow.min.js') }}"></script>
        <script src="{{ asset('asset/lib/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('asset/lib/isotope/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('asset/lib/lightbox/js/lightbox.min.js') }}"></script>
        <script src="{{ asset('asset/lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('asset/lib/counterup/counterup.min.js') }}"></script>
        <script src="{{ asset('asset/lib/slick/slick.min.js') }}"></script>
        <script src="{{ asset('asset/js/select2.min.js') }}"></script>
        <script src="{{asset("asset/admin/js/sweetalert2@11.js")}}"></script>


        <!-- Template Javascript -->
        <script src="{{ asset('asset/js/main.js') }}"></script>
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
        @yield('js')
    </body>
</html>
