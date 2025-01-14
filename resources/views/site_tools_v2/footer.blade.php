
<footer id="footer" class="footer">

    <div class="container footer-top ">
      <div class="row gy-4">
        <div class="col-lg-8 col-md-8 footer-about">
          <a href="/" class="logo d-flex align-items-center">
            <span class="sitename">{{ __('For Engineers') }}</span>
          </a>
          <p>
              {{ __('We specialize in making your dream come true (we are an intermediary website that specializes in providing engineering and technical services and consultations to beneficiaries through specialized experts in the fields of engineering sectors and human resources services)') }}
          </p>


          <div class="footer-contact pt-3" style="">
            <p>{{ __('t.site.0') }}</p>
            {{-- <p>New York, NY 535022</p> --}}
            <p class="mt-3"><strong>{{ __('t.phone') }}:</strong> <a href="tel:{{ __('t.site.1') }}"><span>{{ __('t.site.1') }}</span></a></p>
            <p><strong>{{ __('t.email') }}:</strong> <a href="mailto:{{ __('t.site.2') }}"><span>{{ __('t.site.2') }}</span></a></p>
        </div>

        <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
        </div>

        </div>



        <div class="col-lg-2 col-md-3 footer-links">
          <h4>{{ __('Useful Pages') }}</h4>
          <ul>
            <li><a href="/">{{ __('t.home') }}</a></li>
            <li><a href="{{ route('site.about') }}">{{ __('About') }}</a></a></li>
            <li><a href="#">{{ __('Services') }}</a></li>
            <li><a href="{{ route('service_provider') }}">{{ __('t.service_provider') }}</a></a></li>
            <li><a href="{{ route('company.login-view') }}">{{ __('t.companies') }}</a></li>

          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>{{ __('Services') }}</h4>
          <ul>
            @php
            $categories = App\Models\categories::query()->where('status',1)->whereNotNull('parent_id')->limit(6)->get();
            @endphp
            @foreach ($categories as $cat_val)
            <li><a href="{{ route('site.service.show',['id'=>$cat_val->id]) }}">{{  $cat_val->name }}</a></li>
            @endforeach
          </ul>
        </div>

        {{-- <div class="col-lg-2 col-md-3 footer-links">
          <h4>Hic solutasetp</h4>
          <ul>
            <li><a href="#">Molestiae accusamus iure</a></li>
            <li><a href="#">Excepturi dignissimos</a></li>
            <li><a href="#">Suscipit distinctio</a></li>
            <li><a href="#">Dilecta</a></li>
            <li><a href="#">Sit quas consectetur</a></li>
          </ul>
        </div> --}}



      </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>© <span>{{ __('Copyrights To') }}</span>
            <strong class="px-1 sitename">{{ __('For Engineers') }}</strong>
        </p>
        <div class="credits">
            {{ __('Designed by') }} <a href="https://www.facebook.com/mtg.tech.egy" target="_blank">{{ "Mahgoub Tech" }}</a>
        </div>
    </div>

  </footer>


