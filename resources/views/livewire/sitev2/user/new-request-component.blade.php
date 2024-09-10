@section('title'){{ __('Service') }}@endsection
@section('page_title')@include('site_tools_v2.page_title',['main_title'=>$categories->name])@endsection

<div class="">
    <div class="container-fluid">
        <br>
        <div class="row text-center">
            <div class="col-lg-3">
                {{-- Card Career type --}}
                <div class="card">
                    <div class="card-header bg-primary text-light p-3">
                        <i class="fa-solid fa-user-check"></i>
                    </div>
                    <div class="card-body">
                        <div class="row py-2 ">
                        @foreach ($companiesType as $type )
                            <div class="form-check  col-md-6 ">
                                <input class="form-check-input" wire:model="companySelected" value="{{ $type->id }}" type="radio" name="company" id="career-{{ $type->id }}">
                                <label class="form-check-label" for="career-{{ $type->id }}">
                                    {{ $type->name }}
                                </label>
                          </div>
                        @endforeach
                        </div>
                    </div>
                </div>
                {{--End Card Career type --}}
            </div>
            <div class="col-lg-9">
                <div class="card" >
                    <div class="card-header bg-success text-light p-3">
                        {{ __('Service Providers') }}
                    </div>
                    <div class="card-body" style="overflow-y:scroll; height:70vh;">
                        {{ $getCompany }}
                            <div class="row " >
                                @foreach ($companies as $company)
                                            <div class="col-lg-3 col-md-3 col-sm-3 d-grid gap-2">
                                                <input wire:model="getCompany" type="radio" class="btn-check"  name="card" id="{{ $company->id }}" value="{{ $company->id }}">
                                                <label  class="btn" for="{{ $company->id }}">
                                                    <div class="card border border-0">
                                                        <div class="card-body bg-light">
                                                            <img src="{{ asset('asset/img/for.gif') }}" class="rounded-circle w-50 h-50" alt="">
                                                            <h5 class="card-title">{{ $company->name }}</h5>
                                                            <p class="card-text">{{ $company->about }}</p>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>

                                @endforeach
                            </div>


                    </div>
                    <div class="card-footer">
                        <div class="row p-2">
                            <div class="col-6 text-end">
                                <a href="" class="btn btn-primary rounded-pill">{{ __('t.Submit') }} <i class="fa-solid fa-paper-plane"></i></a>
                            </div>
                            <div class="col-6 text-start" dir="ltr">
                                {{ $companies->links() }}
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
