<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{ __('For Engineers') }} | @yield('title') </title>
  <meta content="{{ __('For Engineers') }}" name="keywords">
  <meta content="{{ __('We specialize in providing professional services with an elite group of engineering offices and independent engineers accredited by the Saudi Engineering Authority') }}" name="description">

  <!-- Favicons -->
  <link href="{{ asset('asset/img/for4.png') }}" rel="icon">
  {{-- <link href="asset/img/apple-touch-icon.png" rel="apple-touch-icon"> --}}

  <!-- Fonts -->

  <!-- Vendor CSS Files -->
  <link href="{{ asset('asset/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('asset/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('asset/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('asset/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('asset/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('asset/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Main CSS File -->
  <link href="{{ asset('asset/site/scroll.css') }}" rel="stylesheet">


  @if(LaravelLocalization::getCurrentLocale() =='en')
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
   <link href="{{ asset('asset/css/main.css') }}" rel="stylesheet">
@else
     <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
     <link href="{{ asset('asset/css/main_rtl.css') }}" rel="stylesheet">
@endif

     <style>
        .whats-app {
                position: fixed;
                width: 60px;
                height: 60px;
                bottom: 40px;
                right: 15px;
                background-color: #25d366;
                color: #FFF;
                border-radius: 50px;
                text-align: center;
                font-size: 30px;
                box-shadow: 2px 2px 3px #999;
                z-index: 100;
            }

            .my-float {
                margin-top: 16px;
            }


     </style>
    @stack('css')
    @livewireStyles
</head>
{{-- class="{{ $page_class }}" --}}
<body>
    @include('site_tools_v2.navbar')
  <main class="main">
    @yield('page_title')
    {{-- @yield('content') --}}
    {{ $slot }}
  </main>

  @include('site_tools_v2.footer')

  <a  class="whats-app" href="https://wa.me/+966566626520" target="_blank">
    <i class="fab fa-whatsapp my-float"></i>
  </a>
  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('asset/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('asset/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('asset/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('asset/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('asset/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('asset/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('asset/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
  <script src="{{asset("asset/admin/js/sweetalert2@11.js")}}"></script>
  <!-- Main JS File -->
  <script src="{{ asset('asset/js/main1.js') }}"></script>
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

    @stack('js')
    @livewireScripts
</body>

</html>
