    <div class="footer wow fadeIn" data-wow-delay="0.3s">
    @isset($info)

    @else
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="footer-contact">
                        <h2>{{ trans('t.contact') }}</h2>
                        <p><i class="fa fa-map-marker-alt"></i> {{ trans('t.site.0') }}</p>
                        <p><i class="fa fa-phone-alt"></i> {{ trans('t.site.1') }}</p>
                        <p><i class="fa fa-envelope"></i> {{ trans('t.site.2') }}</p>
                        <div class="footer-social">
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="footer-link">
                        <h2>{{__('Useful Pages')}}</h2>
                        <a href="{{ route('service_provider') }}">{{ trans('t.service_provider') }}</a>
                        <a href="{{ route('company.login-view') }}">{{ trans('t.companies') }}</a>
                    </div>
                </div>

                @livewire('new-news-email')
            </div>
        </div>
    @endisset
        <div class="container copyright">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; <a href="#">{{ config('app.name') }}</a>, All Right Reserved {{ date('Y') }}. V 1.0</p>
                </div>

                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                <div class="col-md-6">
                    <p>developed by <a target="blank" href="https://www.facebook.com/mtg.tech.egy">Mahgoub Tech</a> </p>
                </div>
            </div>
        </div>
</div>
