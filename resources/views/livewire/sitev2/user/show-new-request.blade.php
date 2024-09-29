@section('title') {{ $showRequest->categories->name }}@endsection
@section('page_title')@include('site_tools_v2.page_title',['no'=>true])@endsection
<div>
    <div style="background-color: #e1f0fc">


        <div class="container py-3">
            <div class="card border-0 ">
                <div class="card-header " style="background-color: var(--blue-color);color:white">

                        <a href="{{ route('user.dashboard') }}"> {{ __('Back') }} <i class="fa-solid {{ app()->getLocale() == 'en' ? 'fa-chevron-right' : 'fa-chevron-left' }}"></i> </a>

                </div>
                <div class="card-body ">
                    <div class="row">
                        <div class="col-md-2 bg-dark" style="height: 10cm;">

                        </div>
                        <div class="col-md-10"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

