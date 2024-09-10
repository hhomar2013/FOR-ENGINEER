@section('title') {{ __('Services') }} @endsection
@section('page_title')@include('site_tools_v2.page_title',['main_title'=>$categories->name])@endsection
<div>

<!-- Service Details Section -->
<section id="service-details" class="service-details section">

    <div class="container">

        <div class="row gy-4">

        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="services-list">
            <a class="active">  {{ $categories->name }}</a>
            </div>
        </div>

        <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
            {{-- <img src="{{ asset('asset/img/services.jpg') }}" alt="" class="img-fluid services-img"> --}}
            {!! $categories->info !!}
            <hr>
            <a href="{{ route('user.request',['id'=>$categories->id]) }}" class="btn btn-success shadow-lg p-2 w-lg-25 rounded-pill text-white">
                <i class="bi bi-send-fill"></i>  {{ __('Order a service') }}
            </a>
        </div>

        </div>

    </div>

</section><!-- /Service Details Section -->



</div>
