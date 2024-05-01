<div>
    <div class="container-fluid mt-4">
        @if($count)
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                           <h3 class="text-danger text-center"> {{__('Service not available')}}</h3>
                        </div>
                        <div class="card-footer {{app()->getLocale() == 'ar' ? 'text-right' : ''}}">
                            <a href="{{route('site.home')}}" class="btn btn-outline-danger">{{__('Back') . ' '. __('t.home')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="p-5 m-3 col-lg-3 text-center">

                    @if($rate >= 6)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger text-white">
                                {{__('Special')}}
                            </span>
                    @endif

                    <img src="{{asset('storage/'.$logo)}}" class="rounded-circle" style="height: 120px;width: 120px" alt="">
                    <div class="row">
                        <div class="col-12">
                            <span>{{$company_name}}</span>
                        </div>
                        <div class="col-12">
                            <small class="text-primary">{{$about}}</small>
                        </div>

                        <div class="col-12">
                            <small class="text-danger">{{$ct_name}}</small>
                        </div>
                    </div>
                </div>{{--End Of Company Info--}}

                @if($pay)
                    {{--                    <div class="mysr-form"></div>--}}
                    {{--                @include('livewire.site.order.pay_with_moyasar')--}}
                    @if($type == 1)
                        <div class="p-5 m-3 col-lg-8 text-right shadow-lg">
                            <ul>
                                <li><span>{{__('Service')}} :  {{$name}}</span> <br>
                                <li><span>{{__('t.price')}} :  {{__('On Request')}}</span></li>
                                @if($discount > 0)
                                    <li>
                                        {{__('Service request price') . ' : ' }}<span style="text-decoration: line-through" class="badge bg-danger text-white">{{ $service_price . __('SAR')}}</span>
                                        &nbsp; <span class="badge bg-primary text-white">{{$discount!=100 ? $after_discount . __('SAR') : __('Offer is free for a specified time') }}  </span>
                                    </li>
                                @else
                                    <li>
                                        &nbsp;<span class="badge bg-primary text-white">{{ $service_price .' '. __('SAR')}}</span>
                                    </li>
                                @endif

                                <hr>
                                <a href="{{route('pay',['amount'=>$amount,'id'=>$order_id])}}" class="btn btn-primary p-4 "><i class="fa fa-wallet"></i> {{__('Pay Now')}}</a>

                                {{--                            @if($discount != 100)--}}
                                {{--                               --}}
                                {{--                            @else--}}
                                {{--                                <hr>--}}
                                {{--                                <a href="{{route('free_pay',['id'=>$order_id])}}" class="btn btn-success p-4 "><i class="fa-solid fa-check"></i> {{__('Order a service')}}</a>--}}

                                {{--                            @endif--}}

                            </ul>

                        </div>
                    @else
                        <div class="p-5 m-3 col-lg-8 text-center shadow-lg">
                            <a href="{{route('pay',['amount'=>$amount,'id'=>$order_id])}}" class="btn btn-primary p-4"><i class="fa fa-wallet"></i> {{__('Pay Now')}}</a>
                        </div>
                    @endif
                @else
                    <div class="p-4 m-3 col-lg-8 text-right shadow-lg">
                        <form wire:submit.prevent="save">
                            <input type="hidden" name="" id=""  wire:model="price">
                            <input type="hidden" name="" id=""  wire:model="service_id">
                            @if($type == 1)
                                <ul>
                                    <li><span>{{__('Service')}} :  {{$name}}</span> <br>
                                    {{--                                <li><span>{{__('t.price')}} :  {{__('On Request')}}</span></li>--}}
                                    @if($discount > 0)
                                        <li>
                                            {{__('Service request price') . ' : ' }}<span style="text-decoration: line-through" class="badge bg-danger text-white">{{ $service_price . __('SAR')}}</span>
                                            &nbsp; <span class="badge bg-primary text-white">{{$discount!=100 ? $after_discount . __('SAR') : __('Offer is free for a specified time') }}  </span>
                                        </li>
                                    @else
                                        <li>
                                            &nbsp;<span class="badge bg-primary text-white">{{ $service_price .' '. __('SAR')}}</span>
                                        </li>
                                    @endif
                                </ul>
                            @else
                                <ul>
                                    <li><span>{{__('Service')}} :  {{$name}}</span></li>

                                    <li><span>{{__('t.price')}} :  {{$price}}  {{__('SR')}}</span></li>
                                </ul>
                            @endif
                            <lable>{{__('Request details')}}</lable>
                            <br>&nbsp;

                            <textarea wire:ignore wire:model.defer="details" data-details="@this" style="height: 100px;" class="form-control editor @error('details') is-invalid @enderror" placeholder=""></textarea>
                            @error('details') <span class="error text-danger ">{{ $message }}</span> @enderror

                            <div class="col-lg-12">
                                <br>
                                <button class="btn btn-primary"><i class="fas fa-paper-plane"></i> {{__('t.Submit')}}</button>
                            </div>
                        </form>

                        <div wire:loading.inline wire:target="save">
                            <div class="spinner-border text-warning" role="status">

                            </div>
                        </div>
                    </div>{{--End Of Invoice--}}
                @endif



            </div>
        @endif


    </div>

</div>

