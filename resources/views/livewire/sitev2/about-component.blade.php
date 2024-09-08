@section('title')
    {{ __('About') }}
@endsection
@section('page_title')
    @include('site_tools_v2.page_title',['main_title'=>__('About')])
@endsection
<div class="about-page">
        <!-- About Section -->
        <section id="about" class="about section">

            <div class="container">

              <div class="row position-relative">

                <div class="col-lg-7 about-img" data-aos="zoom-out" data-aos-delay="200"><img src="{{ asset('asset/img/for.gif') }}"></div>

                <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
                  <h2 class="inner-title">{{ __('For Engineer Platform') }}</h2>
                  <div class="our-story">
                    <h4>{{ __('Since') . ' 2022' }}</h4>
                    <hr/>
                    {{-- <h3></h3> --}}
                    <p>
                      {{ __('We specialize in providing professional services with an elite group of engineering offices and independent engineers accredited by the Saudi Engineering Authority') }}
                    </p>
                    {{-- <ul>
                      <li><i class="bi bi-check-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea commo</span></li>
                      <li><i class="bi bi-check-circle"></i> <span>Duis aute irure dolor in reprehenderit in</span></li>
                      <li><i class="bi bi-check-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea</span></li>
                    </ul>
                    <p>Vitae autem velit excepturi fugit. Animi ad non. Eligendi et non nesciunt suscipit repellendus porro in quo eveniet. Molestias in maxime doloremque.</p> --}}

                    <div class="watch-video d-flex align-items-center position-relative">
                      <i class="bi bi-play-circle"></i>
                      <a href="https://www.youtube.com/watch?v=uaxTrU7vL8I&list=PLCdBSIW9g9VD60wU4e_vi6ZxSRvmoCRb7" class="glightbox stretched-link">{{ __('Watch Video') }}</a>
                    </div>
                  </div>
                </div>

              </div>

            </div>

        </section><!-- /About Section -->

          <!-- Stats Counter Section -->
          <section id="stats-counter" class="stats-counter section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
              <h2>{{ __('Stats') }}</h2>
              {{-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> --}}
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

              <div class="row gy-4">

                <div class="col-lg-3 col-md-6">
                  <div class="stats-item d-flex align-items-center w-100 h-100">
                    <i class="bi bi-emoji-smile color-blue flex-shrink-0"></i>
                    <div>
                      <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                      <p>{{ __('t.customer') }}</p>
                    </div>
                  </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                  <div class="stats-item d-flex align-items-center w-100 h-100">
                    <i class="bi bi-journal-richtext color-orange flex-shrink-0"></i>
                    <div>
                      <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                      <p>{{ __('Projects') }}</p>
                    </div>
                  </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                  <div class="stats-item d-flex align-items-center w-100 h-100">
                    <i class="bi bi-headset color-green flex-shrink-0"></i>
                    <div>
                      <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
                      <p>{{ __('Hours Of Support') }}</p>
                    </div>
                  </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                  <div class="stats-item d-flex align-items-center w-100 h-100">
                    <i class="bi bi-people color-pink flex-shrink-0"></i>
                    <div>
                      <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                      <p>{{ __('Service Providers') }}</p>
                    </div>
                  </div>
                </div><!-- End Stats Item -->

              </div>

            </div>

          </section><!-- /Stats Counter Section -->

          <!-- Alt Services Section -->
          <section id="alt-services" class="alt-services section">

              <div class="container">

                <div class="row justify-content-around gy-4">
                  <div class="features-image col-lg-6" data-aos="fade-up" data-aos-delay="100"><img src="{{ asset('asset/img/logo-1.png') }}" alt=""></div>

                  <div class="col-lg-5 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <h3>{{ __('Vision and mission') }}</h3>
                    <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="300">
                      <i class="bi bi-easel flex-shrink-0"></i>
                      <div>

                        <p>{{ __('Ensuring justice and transparency are achieved and working to provide and develop all advisory services for citizens and residents.') }}</p>
                      </div>
                    </div><!-- End Icon Box -->

                    <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="400">
                      <i class="bi bi-chat-quote flex-shrink-0"></i>
                      <div>
                        {{-- <h4><a href="" class="stretched-link">Nemo Enim</a></h4> --}}
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
                      </div>
                    </div><!-- End Icon Box -->


                  </div>
                </div>

              </div>

              </section><!-- /Alt Services Section -->


          <!-- Team Section -->
          {{-- <section id="team" class="team section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
              <h2>{{ __('Team') }}</h2>
            </div><!-- End Section Title -->

            <div class="container">

              <div class="row gy-5">
                  <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="400">
                  <div class="member-img">
                      <img src="{{ asset('asset/img/team/fares.jpg') }}" class="img-fluid" alt="">
                      <div class="social">
                      <a href="#"><i class="bi bi-facebook"></i></a>
                      <a href="#"><i class="bi bi-linkedin"></i></a>
                      </div>
                  </div>
                  <div class="member-info text-center">
                      <h4>Fares Khaled</h4>
                      <span>CEO</span>
                  </div>
                  </div><!-- End Team Member -->


                <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="300">
                  <div class="member-img">
                    <img src="{{ asset('asset/img/team/omar.jpg') }}" class="img-fluid" alt="">
                    <div class="social">
                      <a href="https://www.facebook.com/mtg.tech.egy" target="_blank"><i class="bi bi-facebook"></i></a>
                      <a href="https://www.linkedin.com/in/omar-mahgoub-91b03815a/" target="_blank"><i class="bi bi-linkedin"></i></a>
                    </div>
                  </div>
                  <div class="member-info text-center">
                    <h4>Omar Al Mahgoub</h4>
                    <span>CTO</span>
                  </div>
                </div><!-- End Team Member -->



              </div>

            </div>

          </section> --}}
          <!-- /Team Section -->

</div>
