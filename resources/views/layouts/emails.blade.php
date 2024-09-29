<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{ __('For Engineers') }} | @yield('title') </title>
  <meta content="{{ __('For Engineers') }}" name="keywords">
  <meta content="{{ __('We specialize in providing professional services with an elite group of engineering offices and independent engineers accredited by the Saudi Engineering Authority') }}" name="description">

  <!-- Favicons -->
  <link href="{{ asset('asset/img/for4.png') }}" rel="icon">
  {{-- <link href="asset/img/apple-touch-icon.png" rel="apple-touch-icon"> --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">


     <style>
        body{
            font-family: "Cairo", sans-serif;
        }

     </style>

</head>
{{-- class="{{ $page_class }}" --}}
<body>
    {{-- @include('site_tools_v2.navbar') --}}

  <main class="main">

    @yield('content')
  </main>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>
