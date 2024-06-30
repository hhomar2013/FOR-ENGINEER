@extends('layouts.guest_new',['title'=>__('Services')])
@section('content')
@section('page_title')@include('site_tools_v2.page_title',['main_title'=>$service->name])@endsection
<!-- Service Details Section -->
<section id="service-details" class="service-details section">

    <div class="container">

        <div class="row gy-4">

        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="services-list">
            <a class="active">{{ $service->name }}</a>
            </div>
        </div>

        <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
            {{-- <img src="{{ asset('asset/img/services.jpg') }}" alt="" class="img-fluid services-img"> --}}
            {!! $service->info !!}
        </div>

        </div>

    </div>

</section><!-- /Service Details Section -->


@endsection
