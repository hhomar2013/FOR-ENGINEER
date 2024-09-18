@section('title'){{ __('Service Provider') }}@endsection
@section('page_title')@include('site_tools_v2.page_title',['main_title'=>__('Service Provider')])@endsection

<div>
    <style>
        label{
            padding: 8px;
        }
    </style>
<div class="container pt-3 pb-5">
        {{-- Start Card --}}
        <div class="card shadow">
            <div class="card-header" style="background-color: var(--orange-color)">
                <h5 class="card-title py-2 text-white">
                    <i class="fa-solid fa-registered"></i>

                    {{ trans('t.service_provider_title') }}</h5>
            </div>
            <div class="card-body">

                <div class="row">
                        @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show {{ (LaravelLocalization::getCurrentLocale() == 'ar' ?'float-right' : '') }} col-12" role="alert">
                            <i class="fa-regular fa-circle-check"></i>
                            <strong>{{ config('app.name') }}</strong> {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <div class="col-md-3">
                            <a href="/" class="btn btn-danger shadow shadow-lg text-white p-3 rounded-4">
                                {{ __('Go Home') }}

                                <i class="fas fa-chevron-{{ (LaravelLocalization::getCurrentLocale() == 'ar' ?'left' : 'right') }}"></i>
                            </a>
                        </div>



                        @else

                        <div class="col-lg-6">
                            <form wire:submit.prevent="SendReservation" autocomplete="off" style="font-size: small">
                                <div class="form-group">

                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <label>{{ trans('t.name') .' '. __('Or') .' '. __('Company Name')}}</label>
                                            <input type="text" class="form-control  @error('name') is-invalid @enderror" placeholder="{{ __('t.name') .' '. __('Or') .' '. __('Company Name') }}" wire:model.defer="name">
                                            @error('name') <span class="error text-danger ">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <label>{{ trans('t.email') }}</label>
                                            <input type="email" class="form-control   @error('email') is-invalid @enderror" placeholder="{{ trans('t.email') }}" wire:model.defer="email">
                                            @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div><!--End row -->

                                    <!-- Start Row -->
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <label>{{ trans('t.phone') }}</label>
                                            <input type="text" class="form-control  @error('phone') is-invalid @enderror" placeholder="{{ trans('t.phone') }}" wire:model.defer="phone">
                                            @error('phone') <span class="error text-danger">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="col-lg-6 col-md-12">
                                            <label>{{ trans('t.type_work') }}</label>
                                            <select class="form-control  @error('type_work') is-invalid @enderror" wire:model.defer="type_work">
                                                {{-- <option value="">{{ trans('t.select') }}</option> --}}
                                                <option value="" selected>{{ trans('t.select') }}</option>
                                                @foreach($companiesType as $ct)
                                                    <option value="{{$ct->id}}">{{$ct->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('type_work') <span class="error text-danger">{{ $message }}</span> @enderror
                                            {{-- <input class="form-control" type="file" /> --}}

                                        </div>
                                    </div>
                                    <!-- End Row -->

                                    <!--Start Row -->
                                    <div class="row">
                                        <div class=" col-md-12">
                                            <label>{{ trans('t.address') }}</label>
                                            <textarea type="text" class="form-control  @error('address') is-invalid @enderror" placeholder="{{ trans('t.address') }}" height="100px;" wire:model.defer="address"></textarea>
                                            @error('address') <span class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <!--End Row -->

                                    <!--Start Row -->
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 ">
                                            <label>{{ trans('t.disc') }}</label>
                                            <textarea type="text" class="form-control  @error('disc') is-invalid @enderror" placeholder="{{ trans('t.disc') }}" height="100px;" wire:model="disc"></textarea>
                                            @error('disc') <span class="error  text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <!--End Row -->

                                    <!--Start Row -->
                                        <div class="row col-lg-12 col-md-12">
                                            <br>

                                            <label for="formFileSm" class="form-label">{{ trans('t.attachment') }}</label>
                                            <input class="form-control form-control-file  @error('attach') is-invalid @enderror" id="formFileSm" type="file" accept="application/pdf"  wire:model="attach"/>
                                            <span class="error text-secondary">{{ __('t.file_size') }}</span>
                                            @error('attach') <span class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    <!--End Row -->

                                </div><!--End Form Group -->


                                <br>
                                <button type="submit" class="btn btn-primary py-2 px-5  rounded-4 {{ (LaravelLocalization::getCurrentLocale() == 'ar' ?'float-right' : '') }}" >
                                    {{ trans('t.Submit') }} <i class="far fa-paper-plane"></i>
                                </button>

                            </form>
                        </div>
                        <div class="col-lg-6 position-relative">
                            <img src="{{ asset('asset/img/for.gif') }}" alt="" class="rounded-5 w-50   d-none d-sm-block position-absolute top-50 start-50 translate-middle">
                        </div>
                        @endif



                </div> {{-- End Row --}}





            </div>
        </div>{{-- End Card --}}
    </div>
</div>
