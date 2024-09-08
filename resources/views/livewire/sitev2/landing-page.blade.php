@section('title')
    {{ __('t.home') }}
@endsection
<div>
    <!-- Hero Section -->
    <section id="hero" class="hero section">

       <div class="info d-flex align-items-center" dir="ltr">
           <div class="container">
           <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
               <div class="col-lg-6 text-center">
               <h2>{{ __('Welcome To') .' '. __('For Engineer Platform') }}</h2>
                   <p>
                       {{ __('We specialize in providing professional services with an elite group of engineering offices and independent engineers accredited by the Saudi Engineering Authority') }}
                   </p>
               {{-- <a href="#get-started" class="btn-get-started">Get Started</a> --}}
               </div>
           </div>
           </div>
       </div>

       <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000" dir="ltr">

           <div class="carousel-item active">
               <img src="{{ asset('asset/img/for.gif') }}" alt="">

           </div>
           <div class="carousel-item">
           <img src="{{ asset('asset/img/carousel-1.jpg') }}" alt="">
           </div>

           {{-- <div class="carousel-item">
           <img src="asset/img/carousel-3.jpg" alt="">
           </div> --}}

           <div class="carousel-item">
               <img src="{{ asset('asset/img/carousel-2.jpg') }}" alt="">
           </div>

           {{-- <div class="carousel-item">
           <img src="asset/img/about.jpg" alt="">
           </div> --}}

           <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
           <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
           </a>

           <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
           <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
           </a>

       </div>

       </section><!-- /Hero Section -->

       <!-- Get Started Section -->
       <section id="get-started" class="get-started section">


       <!-- Services Section -->
       <section id="services" class="services section">

       <!-- Section Title -->
       <div class="container section-title" data-aos="fade-up">
           <h2>{{ __('Services') }}</h2>
           <p>{{ __("Don't hesitate to request your service with us") }}</p>
           <br>
           <div class="button-group text-center">
               <button class="btn btn-warning  rounded-pill " data-filter="*">{{ __('Select all') }}</button>
               @foreach ($categories->where('parent_id',null) as $val)
               <button class="btn  rounded-pill " data-filter=".{{ $val->id }}">{{ $val->name }}</button>
               @endforeach
           </div>


       </div><!-- End Section Title -->

       <div class="container" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">


           <div class="row gy-4 grid" >
               @include('site_tools_v2.service_card',['query'=>$categories])
           </div>


       </div>

       </section><!-- /Services Section -->

       <!-- Alt Services Section -->
       <section id="alt-services" class="alt-services section">

       <div class="container">

           <div class="row justify-content-around gy-4">
           <div class="features-image col-lg-6" data-aos="fade-up" data-aos-delay="100"><img src="asset/img/alt-services.jpg" alt=""></div>

           <div class="col-lg-5 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
               <h3>Enim quis est voluptatibus aliquid consequatur fugiat</h3>
               <p>Esse voluptas cumque vel exercitationem. Reiciendis est hic accusamus. Non ipsam et sed minima temporibus laudantium. Soluta voluptate sed facere corporis dolores excepturi</p>

               <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="300">
               <i class="bi bi-easel flex-shrink-0"></i>
               <div>
                   <h4><a href="" class="stretched-link">Lorem Ipsum</a></h4>
                   <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
               </div>
               </div><!-- End Icon Box -->

               <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="400">
               <i class="bi bi-patch-check flex-shrink-0"></i>
               <div>
                   <h4><a href="" class="stretched-link">Nemo Enim</a></h4>
                   <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
               </div>
               </div><!-- End Icon Box -->

               <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="500">
               <i class="bi bi-brightness-high flex-shrink-0"></i>
               <div>
                   <h4><a href="" class="stretched-link">Dine Pad</a></h4>
                   <p>Explicabo est voluptatum asperiores consequatur magnam. Et veritatis odit. Sunt aut deserunt minus aut eligendi omnis</p>
               </div>
               </div><!-- End Icon Box -->

               <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="600">
               <i class="bi bi-brightness-high flex-shrink-0"></i>
               <div>
                   <h4><a href="" class="stretched-link">Tride clov</a></h4>
                   <p>Est voluptatem labore deleniti quis a delectus et. Saepe dolorem libero sit non aspernatur odit amet. Et eligendi</p>
               </div>
               </div><!-- End Icon Box -->

           </div>
           </div>

       </div>

       </section><!-- /Alt Services Section -->

       <!-- Features Section -->
       <section id="features" class="features section">

       <div class="container">

           <ul class="nav nav-tabs row  g-2 d-flex" data-aos="fade-up" data-aos-delay="100" role="tablist">

           <li class="nav-item col-3" role="presentation">
               <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1" aria-selected="true" role="tab">
               <h4>Modisit</h4>
               </a>
           </li><!-- End tab nav item -->

           <li class="nav-item col-3" role="presentation">
               <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2" aria-selected="false" tabindex="-1" role="tab">
               <h4>Praesenti</h4>
               </a><!-- End tab nav item -->

           </li>
           <li class="nav-item col-3" role="presentation">
               <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3" aria-selected="false" tabindex="-1" role="tab">
               <h4>Explica</h4>
               </a>
           </li><!-- End tab nav item -->

           <li class="nav-item col-3" role="presentation">
               <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-4" aria-selected="false" tabindex="-1" role="tab">
               <h4>Nostrum</h4>
               </a>
           </li><!-- End tab nav item -->

           </ul>

           <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

           <div class="tab-pane fade active show" id="features-tab-1" role="tabpanel">
               <div class="row">
               <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                   <h3>Voluptatem dignissimos provident</h3>
                   <p class="fst-italic">
                   Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                   magna aliqua.
                   </p>
                   <ul>
                   <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></li>
                   <li><i class="bi bi-check2-all"></i> <span>Duis aute irure dolor in reprehenderit in voluptate velit.</span></li>
                   <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</span></li>
                   </ul>
               </div>
               <div class="col-lg-6 order-1 order-lg-2 text-center">
                   <img src="asset/img/features-1.jpg" alt="" class="img-fluid">
               </div>
               </div>
           </div><!-- End tab content item -->

           <div class="tab-pane fade" id="features-tab-2" role="tabpanel">
               <div class="row">
               <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                   <h3>Neque exercitationem debitis</h3>
                   <p class="fst-italic">
                   Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                   magna aliqua.
                   </p>
                   <ul>
                   <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></li>
                   <li><i class="bi bi-check2-all"></i> <span>Duis aute irure dolor in reprehenderit in voluptate velit.</span></li>
                   <li><i class="bi bi-check2-all"></i> <span>Provident mollitia neque rerum asperiores dolores quos qui a. Ipsum neque dolor voluptate nisi sed.</span></li>
                   <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</span></li>
                   </ul>
               </div>
               <div class="col-lg-6 order-1 order-lg-2 text-center">
                   <img src="asset/img/features-2.jpg" alt="" class="img-fluid">
               </div>
               </div>
           </div><!-- End tab content item -->

           <div class="tab-pane fade" id="features-tab-3" role="tabpanel">
               <div class="row">
               <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                   <h3>Voluptatibus commodi accusamu</h3>
                   <ul>
                   <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></li>
                   <li><i class="bi bi-check2-all"></i> <span>Duis aute irure dolor in reprehenderit in voluptate velit.</span></li>
                   <li><i class="bi bi-check2-all"></i> <span>Provident mollitia neque rerum asperiores dolores quos qui a. Ipsum neque dolor voluptate nisi sed.</span></li>
                   </ul>
                   <p class="fst-italic">
                   Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                   magna aliqua.
                   </p>
               </div>
               <div class="col-lg-6 order-1 order-lg-2 text-center">
                   <img src="asset/img/features-3.jpg" alt="" class="img-fluid">
               </div>
               </div>
           </div><!-- End tab content item -->

           <div class="tab-pane fade" id="features-tab-4" role="tabpanel">
               <div class="row">
               <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                   <h3>Omnis fugiat ea explicabo sunt</h3>
                   <p class="fst-italic">
                   Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                   magna aliqua.
                   </p>
                   <ul>
                   <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></li>
                   <li><i class="bi bi-check2-all"></i> <span>Duis aute irure dolor in reprehenderit in voluptate velit.</span></li>
                   <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</span></li>
                   </ul>
               </div>
               <div class="col-lg-6 order-1 order-lg-2 text-center">
                   <img src="asset/img/features-4.jpg" alt="" class="img-fluid">
               </div>
               </div>
           </div><!-- End tab content item -->

           </div>

       </div>

       </section><!-- /Features Section -->

       <!-- Projects Section -->
       <section id="projects" class="projects section">

       <!-- Section Title -->
       <div class="container section-title" data-aos="fade-up">
           <h2>Projects</h2>
           <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
       </div><!-- End Section Title -->

       <div class="container">

           <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

               <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                   <li data-filter="*" class="filter-active">All</li>
                   <li data-filter=".filter-remodeling">Remodeling</li>
                   <li data-filter=".filter-construction">Construction</li>
                   <li data-filter=".filter-repairs">Repairs</li>
                   <li data-filter=".filter-design">Design</li>
               </ul><!-- End Portfolio Filters -->

               <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                   <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-remodeling">
                   <div class="portfolio-content h-100">
                       <img src="asset/img/projects/remodeling-1.jpg" class="img-fluid" alt="">
                       <div class="portfolio-info">
                       <h4>App 1</h4>
                       <p>Lorem ipsum, dolor sit amet consectetur</p>
                       <a href="asset/img/projects/remodeling-1.jpg" title="App 1" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                       <a href="project-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                       </div>
                   </div>
                   </div><!-- End Portfolio Item -->

                   <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-construction">
                   <div class="portfolio-content h-100">
                       <img src="asset/img/projects/construction-1.jpg" class="img-fluid" alt="">
                       <div class="portfolio-info">
                       <h4>Product 1</h4>
                       <p>Lorem ipsum, dolor sit amet consectetur</p>
                       <a href="asset/img/projects/construction-1.jpg" title="Product 1" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                       <a href="project-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                       </div>
                   </div>
                   </div><!-- End Portfolio Item -->

                   <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-repairs">
                   <div class="portfolio-content h-100">
                       <img src="asset/img/projects/repairs-1.jpg" class="img-fluid" alt="">
                       <div class="portfolio-info">
                       <h4>Branding 1</h4>
                       <p>Lorem ipsum, dolor sit amet consectetur</p>
                       <a href="asset/img/projects/repairs-1.jpg" title="Branding 1" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                       <a href="project-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                       </div>
                   </div>
                   </div><!-- End Portfolio Item -->

                   <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-design">
                   <div class="portfolio-content h-100">
                       <img src="asset/img/projects/design-1.jpg" class="img-fluid" alt="">
                       <div class="portfolio-info">
                       <h4>Books 1</h4>
                       <p>Lorem ipsum, dolor sit amet consectetur</p>
                       <a href="asset/img/projects/design-1.jpg" title="Branding 1" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                       <a href="project-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                       </div>
                   </div>
                   </div><!-- End Portfolio Item -->

                   <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-remodeling">
                   <div class="portfolio-content h-100">
                       <img src="asset/img/projects/remodeling-2.jpg" class="img-fluid" alt="">
                       <div class="portfolio-info">
                       <h4>App 2</h4>
                       <p>Lorem ipsum, dolor sit amet consectetur</p>
                       <a href="asset/img/projects/remodeling-2.jpg" title="App 2" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                       <a href="project-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                       </div>
                   </div>
                   </div><!-- End Portfolio Item -->

                   <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-construction">
                   <div class="portfolio-content h-100">
                       <img src="asset/img/projects/construction-2.jpg" class="img-fluid" alt="">
                       <div class="portfolio-info">
                       <h4>Product 2</h4>
                       <p>Lorem ipsum, dolor sit amet consectetur</p>
                       <a href="asset/img/projects/construction-2.jpg" title="Product 2" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                       <a href="project-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                       </div>
                   </div>
                   </div><!-- End Portfolio Item -->

                   <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-repairs">
                   <div class="portfolio-content h-100">
                       <img src="asset/img/projects/repairs-2.jpg" class="img-fluid" alt="">
                       <div class="portfolio-info">
                       <h4>Branding 2</h4>
                       <p>Lorem ipsum, dolor sit amet consectetur</p>
                       <a href="asset/img/projects/repairs-2.jpg" title="Branding 2" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                       <a href="project-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                       </div>
                   </div>
                   </div><!-- End Portfolio Item -->

                   <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-design">
                   <div class="portfolio-content h-100">
                       <img src="asset/img/projects/design-2.jpg" class="img-fluid" alt="">
                       <div class="portfolio-info">
                       <h4>Books 2</h4>
                       <p>Lorem ipsum, dolor sit amet consectetur</p>
                       <a href="asset/img/projects/design-2.jpg" title="Branding 2" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                       <a href="project-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                       </div>
                   </div>
                   </div><!-- End Portfolio Item -->

                   <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-remodeling">
                   <div class="portfolio-content h-100">
                       <img src="asset/img/projects/remodeling-3.jpg" class="img-fluid" alt="">
                       <div class="portfolio-info">
                       <h4>App 3</h4>
                       <p>Lorem ipsum, dolor sit amet consectetur</p>
                       <a href="asset/img/projects/remodeling-3.jpg" title="App 3" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                       <a href="project-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                       </div>
                   </div>
                   </div><!-- End Portfolio Item -->

                   <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-construction">
                   <div class="portfolio-content h-100">
                       <img src="asset/img/projects/construction-3.jpg" class="img-fluid" alt="">
                       <div class="portfolio-info">
                       <h4>Product 3</h4>
                       <p>Lorem ipsum, dolor sit amet consectetur</p>
                       <a href="asset/img/projects/construction-3.jpg" title="Product 3" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                       <a href="project-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                       </div>
                   </div>
                   </div><!-- End Portfolio Item -->

                   <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-repairs">
                   <div class="portfolio-content h-100">
                       <img src="asset/img/projects/repairs-3.jpg" class="img-fluid" alt="">
                       <div class="portfolio-info">
                       <h4>Branding 3</h4>
                       <p>Lorem ipsum, dolor sit amet consectetur</p>
                       <a href="asset/img/projects/repairs-3.jpg" title="Branding 2" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                       <a href="project-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                       </div>
                   </div>
                   </div><!-- End Portfolio Item -->

                   <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-design">
                   <div class="portfolio-content h-100">
                       <img src="asset/img/projects/design-3.jpg" class="img-fluid" alt="">
                       <div class="portfolio-info">
                       <h4>Books 3</h4>
                       <p>Lorem ipsum, dolor sit amet consectetur</p>
                       <a href="asset/img/projects/design-3.jpg" title="Branding 3" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                       <a href="project-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                       </div>
                   </div>
                   </div><!-- End Portfolio Item -->

               </div><!-- End Portfolio Container -->

           </div>

       </div>

       </section><!-- /Projects Section -->

       <!-- Testimonials Section -->
       <section id="testimonials" class="testimonials section">

       <!-- Section Title -->
       <div class="container section-title" data-aos="fade-up">
           <h2>Testimonials</h2>
           <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
       </div><!-- End Section Title -->

       <div class="container" data-aos="fade-up" data-aos-delay="100">

           <div class="swiper init-swiper">
           <script type="application/json" class="swiper-config">
               {
               "loop": true,
               "speed": 600,
               "autoplay": {
                   "delay": 5000
               },
               "slidesPerView": "auto",
               "pagination": {
                   "el": ".swiper-pagination",
                   "type": "bullets",
                   "clickable": true
               },
               "breakpoints": {
                   "320": {
                   "slidesPerView": 1,
                   "spaceBetween": 40
                   },
                   "1200": {
                   "slidesPerView": 2,
                   "spaceBetween": 20
                   }
               }
               }
           </script>
           <div class="swiper-wrapper">

               <div class="swiper-slide">
               <div class="testimonial-wrap">
                   <div class="testimonial-item">
                   <img src="asset/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                   <h3>Saul Goodman</h3>
                   <h4>Ceo &amp; Founder</h4>
                   <div class="stars">
                       <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                   </div>
                   <p>
                       <i class="bi bi-quote quote-icon-left"></i>
                       <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.</span>
                       <i class="bi bi-quote quote-icon-right"></i>
                   </p>
                   </div>
               </div>
               </div><!-- End testimonial item -->

               <div class="swiper-slide">
               <div class="testimonial-wrap">
                   <div class="testimonial-item">
                   <img src="asset/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                   <h3>Sara Wilsson</h3>
                   <h4>Designer</h4>
                   <div class="stars">
                       <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                   </div>
                   <p>
                       <i class="bi bi-quote quote-icon-left"></i>
                       <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.</span>
                       <i class="bi bi-quote quote-icon-right"></i>
                   </p>
                   </div>
               </div>
               </div><!-- End testimonial item -->

               <div class="swiper-slide">
               <div class="testimonial-wrap">
                   <div class="testimonial-item">
                   <img src="asset/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                   <h3>Jena Karlis</h3>
                   <h4>Store Owner</h4>
                   <div class="stars">
                       <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                   </div>
                   <p>
                       <i class="bi bi-quote quote-icon-left"></i>
                       <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.</span>
                       <i class="bi bi-quote quote-icon-right"></i>
                   </p>
                   </div>
               </div>
               </div><!-- End testimonial item -->

               <div class="swiper-slide">
               <div class="testimonial-wrap">
                   <div class="testimonial-item">
                   <img src="asset/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                   <h3>Matt Brandon</h3>
                   <h4>Freelancer</h4>
                   <div class="stars">
                       <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                   </div>
                   <p>
                       <i class="bi bi-quote quote-icon-left"></i>
                       <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.</span>
                       <i class="bi bi-quote quote-icon-right"></i>
                   </p>
                   </div>
               </div>
               </div><!-- End testimonial item -->

               <div class="swiper-slide">
               <div class="testimonial-wrap">
                   <div class="testimonial-item">
                   <img src="asset/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                   <h3>John Larson</h3>
                   <h4>Entrepreneur</h4>
                   <div class="stars">
                       <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                   </div>
                   <p>
                       <i class="bi bi-quote quote-icon-left"></i>
                       <span>Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.</span>
                       <i class="bi bi-quote quote-icon-right"></i>
                   </p>
                   </div>
               </div>
               </div><!-- End testimonial item -->

           </div>
           <div class="swiper-pagination"></div>
           </div>

       </div>

       </section><!-- /Testimonials Section -->

       <!-- Recent Blog Posts Section -->
       <section id="recent-blog-posts" class="recent-blog-posts section">

       <!-- Section Title -->
       <div class="container section-title" data-aos="fade-up">
           <h2>Recent Blog Posts</h2>
           <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
       </div><!-- End Section Title -->

       <div class="container">

           <div class="row gy-5">

           <div class="col-xl-4 col-md-6">
               <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="100">

               <div class="post-img position-relative overflow-hidden">
                   <img src="asset/img/blog/blog-1.jpg" class="img-fluid" alt="">
                   <span class="post-date">December 12</span>
               </div>

               <div class="post-content d-flex flex-column">

                   <h3 class="post-title">Eum ad dolor et. Autem aut fugiat debitis</h3>

                   <div class="meta d-flex align-items-center">
                   <div class="d-flex align-items-center">
                       <i class="bi bi-person"></i> <span class="ps-2">Julia Parker</span>
                   </div>
                   <span class="px-3 text-black-50">/</span>
                   <div class="d-flex align-items-center">
                       <i class="bi bi-folder2"></i> <span class="ps-2">Politics</span>
                   </div>
                   </div>

                   <hr>

                   <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>

               </div>

               </div>
           </div><!-- End post item -->

           <div class="col-xl-4 col-md-6">
               <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="200">

               <div class="post-img position-relative overflow-hidden">
                   <img src="asset/img/blog/blog-2.jpg" class="img-fluid" alt="">
                   <span class="post-date">July 17</span>
               </div>

               <div class="post-content d-flex flex-column">

                   <h3 class="post-title">Et repellendus molestiae qui est sed omnis</h3>

                   <div class="meta d-flex align-items-center">
                   <div class="d-flex align-items-center">
                       <i class="bi bi-person"></i> <span class="ps-2">Mario Douglas</span>
                   </div>
                   <span class="px-3 text-black-50">/</span>
                   <div class="d-flex align-items-center">
                       <i class="bi bi-folder2"></i> <span class="ps-2">Sports</span>
                   </div>
                   </div>

                   <hr>

                   <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>

               </div>

               </div>
           </div><!-- End post item -->

           <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
               <div class="post-item position-relative h-100">

               <div class="post-img position-relative overflow-hidden">
                   <img src="asset/img/blog/blog-3.jpg" class="img-fluid" alt="">
                   <span class="post-date">September 05</span>
               </div>

               <div class="post-content d-flex flex-column">

                   <h3 class="post-title">Quia assumenda est et veritati tirana ploder</h3>

                   <div class="meta d-flex align-items-center">
                   <div class="d-flex align-items-center">
                       <i class="bi bi-person"></i> <span class="ps-2">Lisa Hunter</span>
                   </div>
                   <span class="px-3 text-black-50">/</span>
                   <div class="d-flex align-items-center">
                       <i class="bi bi-folder2"></i> <span class="ps-2">Economics</span>
                   </div>
                   </div>

                   <hr>

                   <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>

               </div>

               </div>
           </div><!-- End post item -->

           </div>

       </div>

       </section><!-- /Recent Blog Posts Section -->

</div>
