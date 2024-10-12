@section('title') {{ $showRequest->categories->name }}@endsection
@section('page_title')@include('site_tools_v2.page_title',['no'=>true])@endsection

<div>

    <div style="background-color: #e1f0fc">

        <div class="container py-3 border-0">
            <div class="card border-0">
                <div class="card-header rounded-top-3 py-3" style="background-color: var(--blue-color);color:white">
                   <a href="{{ route('user.dashboard') }}" class="btn btn-danger"> {{ __('Back') }} <i class="fa-solid {{ app()->getLocale() == 'en' ? 'fa-chevron-right' : 'fa-chevron-left' }}"></i> </a>
                </div>
                <div class="card-body rounded-3 shadow-lg ">
                    <div class="row">
                        <div class="col-md-8">
                            @if ($showRequest->status ==0)
                            @include('site_v2.status_request',['icon'=>'fa-clock-rotate-left bg-warning','title'=> __('pending')])
                            @else
                            @endif

                        </div>
                        <div class="col-md-4 ">

                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <div class="card shadow p-2">
               <div class="card-body">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-12  border-start ">
                                <div class="card-title py-2">
                                    <h5><b>{{ __('Order details') }}</b></h5>
                                    <hr>
                                </div>
                                <div class="card-text">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="" class="p-2">{{ __('Asking price') }}</label>
                                            <div class="bg-light rounded-pill py-2">
                                                    <div class="row text-center">
                                                        <div class="col-4">
                                                            <i class="fa-solid fa-coins text-start"></i>
                                                        </div>
                                                        <div class="col-4">
                                                            {{ $showRequest->max_asked_price . ' - ' . $showRequest->min_asked_price }}
                                                        </div>
                                                        <div class="col-4">
                                                           <span> {{ __('SR') }}</span>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="" class="p-2">{{ __('Implementation period') }}</label>
                                            <div class="bg-light rounded-pill py-2">
                                                    <div class="row text-center">
                                                        <div class="col-4 ">
                                                            <i class="fa-solid fa-calendar-day"></i>
                                                        </div>
                                                        <div class="col-8 text-end">
                                                            <span>{{ $showRequest->dayes }}</span>

                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="" class="p-2">{{ __('Closing date for receiving offers') }}</label>
                                            <div class="bg-light rounded-pill py-2">
                                                    <div class="row text-center">
                                                        <div class="col-12">
                                                            {{ $showRequest->offer_end_date }}
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card-title py-1">
                            <h4><b>{{ __('Implementing agency') }}</b></h4>
                            <hr>
                        </div>
                        <div class="card-text p-4 text-center">
                            <span><b>{{ $showRequest->offer_id == 0 ? __('Not selected yet') : '' }}</b></span>
                        </div>
                    </div>
                </div>
               </div>
            </div>
            <br>
            <div class="card shadow">
                <div class="card-body">
                    <div class="row p-3">
                        <div class="col-6 text-end">
                            <i class="fa-regular fa-bookmark"></i> &nbsp; <span class="text-black-50">{{ $showRequest->order_title }}</span>
                        <hr>
                        </div>
                        <div class="col-6 text-start">
                            <i class="fa-regular fa-clock"></i>   <span class="text-black-50">
                                {{-- {{\Carbon\Carbon::parse($showRequest->created_at)->diffForHumans() }}  --}}
                                {{ $showRequest->dayeName }}
                            </span>
                        </div>
                    </div>
                  <h6> {!! $showRequest->description !!}</h6>
                </div>
            </div>
            <br>
            @if ($showRequest->attachment != 0)
            <div class="card shadow">
                <div class="card-body">
                    {{-- Attachment --}}
                    <div class="card-title">
                        <i class="fa-solid fa-paperclip"></i> <span>{{ __('Attachments') }}</span>
                    </div>
                    <div class="">
                        @if($showRequest->ext == true)
                        <i class="fa-regular fa-file-pdf"></i>
                        @endif
                        <a class="text-info" href="{{ env('APP_URL') .'/storage/'. $showRequest->attachment  }}" target="_blank" >{{ __('Attachment') .'-' . $showRequest->order_title }}</a>
                        <br><br>
                        <i class="fa-solid fa-download"></i> <a class="text-danger" href="#" wire:click.prevent="getFile()">{{ __('Download') }}</a>
                    </div>
                </div>
            </div>
            @endif

        </div>



    </div>
</div>

