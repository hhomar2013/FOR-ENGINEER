<div >
    <div class="">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-center bg-dark text-white">{{__('Daily Orders')}}</div>
                    <div class="card-body">
                        @include('message')
{{--                        @include('load')--}}
                        <div class="row shadow p-3 mb-3 bg-body rounded">
                            <div class=" col-lg-3 col-md-6 col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-append">

                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-dark text-white">{{ __('t.pages') }}</span>
                                        <select class="form-select-sm" wire:model="numbers" wire:change="pages_num">
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                            </div>

                            <div class="col-md-6 ">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-dark text-white"><i class="fa fa-search"></i></span>
                                    <input type="text" name="" id="search" class="form-control" wire:model="search"/>

                                </div>
                                <hr>
                            </div><!--End of search  -->


                        </div>

                        <div class="row shadow">
                            <div class=" p-2 col-lg-6">
                                <button class="btn btn-outline-primary {{$filter == 8 ? 'active' : '' }}" wire:click.prevent="filter(8)">{{__('Done')}} <span class="text-sm">✔️</span></button>
{{--                                <button class="btn btn-outline-primary {{$filter == 3 ? 'active' : '' }}" wire:click.prevent="filter(3)">{{__('Done Replayed')}} <span class="text-sm">✔️</span></button>--}}
                                <button class="btn btn-outline-primary text-sm-center {{$filter == 1 ? 'active' : '' }}" wire:click.prevent="filter(1)">{{__('pending')}} <span class=" text-sm-center text-warning">🗓️</span></button>
                            </div>
                            <div class="text-start p-3 col-lg-6">
                                @include('load',['name'=>'filter'])
                            </div>
                        </div>




                        <div class="row" >

{{--                                {{dd($orders)}}--}}
                                @forelse($orders as $val)
                                <div class="col-lg-4 col-md-12 col-sm-12 " >
                                    <div class="list-group p-2">
                                        <a class="list-group-item list-group-item-action text-sm-center" aria-current="true">
                                            <div class="d-flex w-100 justify-content-between">
                                                <span class="text-danger"># {{$val->order_ref}}</span>
                                                <small>{{\Carbon\Carbon::parse($val->updated_at)->diffForHumans()}}</small>
                                            </div>
                                            <span class="mb-1 text-dark">{{$val->name}}</span>

{{--                                        <p class="mb-1">{{$val->details}}</p>--}}
                                            <div class="d-flex justify-content-between p-1 input-group">
                                                <small>{{$val->category_name}}</small>
                                                @if($val->status != 8)
                                                    <button class="btn btn-outline-success btn-sm rounded-pill w-25"   wire:click="reply({{$val->id}})"><i class="fas fa-reply"></i></button>
                                                @endif
                                            </div>
                                            @if($close_order)
                                                <button class="btn btn-outline-danger btn-sm rounded-pill w-25" wire:click="closeOrder" ><i class="fa fa-times"></i></button>
                                            @endif

                                        </a>

                                    </div>
                                </div>
                                 @empty
                                <img src="{{asset('asset/img/nodata.png')}}" class="w-25 rounded mx-auto d-block" alt="">
{{--                                 <h5 class="text-center text-danger p-5">{{__('No Data')}}</h5>--}}
                                @endforelse

                            <div class="col-lg-12">
                                @if($data)
                                    <hr>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="card text-end border-bottom-primary">
                                            <div class="card-body"  style="font-size: 12px !important;">{!! $details !!}</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        {{--<textarea class="form-control bg-white" wire:model="" readonly></textarea>--}}
                                        <br>
                                        @if($type == 1 && $order_status != 6)
                                            <label for=""></label>
                                            <div class="input-group text-center" dir="ltr">
                                                <span class="input-group-text">{{__('SAR')}}</span>
                                                <input type="number" class="form-control" min="0" wire:model="ask_price" wire:change.self="$emitUp('ask_price')">
{{--                                                <span class="input-group-text"><i class="far fa-credit-card"></i></span>--}}
                                                <span class="input-group-text">المبلغ المطلوب</span>
                                                <input type="text" class="form-control" min="0" wire:model="present" readonly>
                                                <span class="input-group-text">نسبة الموقع</span>
                                            </div>
                                        &nbsp;
                                            <h5>صافى المطلوب : {{$final_price}}</h5>
                                            <br>
                                            <label>{{__('comments')}}</label>
                                            <textarea class="form-control editor"  name="" id="editor" wire:model="comment"></textarea>
{{--                                            <input type="hidden" wire:model.defer="order_ref" />--}}
                                            <hr>
                                            <button class="btn btn-primary" wire:click.prevent="send_price_to_customer">{{__('t.Submit')}} <i class="far fa-paper-plane"></i>
                                                @include('load',['name'=>'send_price_to_customer'])
                                            </button>
                                        @elseif($type == 1 && $order_status == 6)
                                            <h5 class="text-success">{{__('Your deal is confirmed by your customer ,You can work now')}}</h5>
                                            <hr>
                                            <button class="btn btn-outline-success">{{__('Finish Order Successfully')}}</button>
                                        @elseif ($type == 0 ||  $order_status == 6)
                                            @include('company.companies-orders-response')
                                        @elseif($type == 0 ||  $order_status == 6)

                                        @endif

                                    </div>
                                </div>


                                @endif

                            </div>
                        </div>

                    </div>

                    <span class="p-3">{{$orders->links()}}</span>

                </div>
            </div>
        </div>
    </div>
</div>



