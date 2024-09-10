<div>
@section('title'){{ __('Profile') }}@endsection
@section('page_title')@include('site_tools_v2.page_title',['main_title'=>__('Profile')])@endsection
    <!-- Starter Section Section -->
    <section id="starter-section" class="starter-section section">
        <div class="container" data-aos="fade-up">
            <form class="g-3 col-md-6 " wire:submit.prevent="save">
                <div class="row g-3 ">
                    <div class="col-md-6">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input wire:model="name" type="text" class="form-control" id="name">
                      </div>
                </div>
                <div class="row g-3 ">
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" class="form-control" id="inputPassword4">
                      </div>
                </div>
                &nbsp;
                <div class="col-12">
                  <button type="submit" class="btn btn-warning ">Sign in</button>
                </div>
              </form>
        </div>

      </section><!-- /Starter Section Section -->
</div>
