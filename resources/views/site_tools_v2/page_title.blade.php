
@isset($no)
  <div class="page-title" style="background-image: url({{ asset('asset/img/page-title-bg.jpg') }})">
    </div>
@else
<!-- Page Title -->
<div class="page-title" style="background-image: url({{ asset('asset/img/page-title-bg.jpg') }});">
    <div class="container position-relative">
      <h1>{{ $main_title }}</h1>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="/">{{ __('t.home') }}</a></li>
          <li class="current">{{ $main_title }}</li>
        </ol>
      </nav>
    </div>
  </div>
  <!-- End Page Title -->
@endisset
