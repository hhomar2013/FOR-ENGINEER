@extends('layouts.guest',['title'=> trans('t.home')])
@section('content')

<!-- Carousel Start -->
<div id="carousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel" data-slide-to="0" class="active"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
{{--        <li data-target="#carousel" data-slide-to="2"></li>--}}
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('asset/img/carousel-1.jpg') }}" alt="Carousel Image">
            <div class="carousel-caption">
                <p class="animated fadeInRight">{{__('We Are Professional')}}</p>
                <h1 class="animated fadeInLeft">{{ __('To Achieve Your Dream') }}</h1>
{{--                <a class="btn animated fadeInUp" href="https://htmlcodex.com/construction-company-website-template">Get A Quote</a>--}}
            </div>
        </div>

        <div class="carousel-item">
            <img src="{{ asset('asset/img/carousel-2.jpg') }}" alt="Carousel Image">
            <div class="carousel-caption">
                <p class="animated fadeInRight">{{__('Professional Service')}}</p>
                <h1 class="animated fadeInLeft">{{__('We Serve Your Life')}}</h1>
{{--                <a class="btn animated fadeInUp" href="https://htmlcodex.com/construction-company-website-template">Get A Quote</a>--}}
            </div>
        </div>

       </div>

    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- Carousel End -->


<!-- Feature Start-->
<div class="feature wow fadeInUp" data-wow-delay="0.1s">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="flaticon-building"></i>
                    </div>
                    <div class="feature-text">
                        <h3>{{__('Quality Work')}}</h3>
                        <p>{{__('We have highly experienced service providers selected at the highest level')}} .</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="flaticon-call"></i>
                    </div>
                    <div class="feature-text">
                        <h3>{{__('Support 7 days in 24 hours')}}</h3>
                        <p>{{__('You can talk to us at any time')}} .</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature End-->


<!-- Service Start -->
@if($categories->count())
    <div class="service">
        <div class="container">
            <div class="section-header text-center">
                <p>{{__('t.service')}}</p>
                <h2 class="text-decoration-underline">{{__('We provide this Services')}}</h2>
            </div>
            <div>
                <div class="row">

                    @foreach($categories as $val)
                        {{-- <div class="col-lg-3 col-md-6">
                            <div class="card text-center shadow-lg m-1">
                                <a class="p-4"> <span>{{$i++}}</span> -  {{$val->name}}</a>
                            </div>
                        </div> --}}

                        @if($val->child->count() > 0)
                        <div class="col-lg-4 col-md-4">
                            <div class="card text-center border border-0">
                                <div class="card-title ">
                                    <h5>{{$val->name}}</h5>
                                </div>
                                <div class="card-body">
                                    <?php $i = 1; ?>
                                    @foreach($val->child as $val_child)
                                    <div class="col-lg-12 col-md-12">
                                        <div class="card text-center shadow-lg m-1">
                                            <a class="p-4"> <span>{{$i++}}</span> -  {{$val_child->name}}</a>
                                        </div>
                                    </div>
                                @endforeach


                                </div>

                            </div>
                        </div>

                        @endif
                    @endforeach

                </div>
            </div>

        </div>
    </div>
@endif
<!-- Service End -->




@endsection
