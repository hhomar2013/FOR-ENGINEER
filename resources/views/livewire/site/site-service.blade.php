<div>
{{--    <button class="btn btn-primary" wire:click="$emit('orderSend')">send notification audio</button>--}}
    <div class="carousel1">
        <br>
        <br>
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-md-3 text-right">
                    <div class="card shadow">
                        <div class="card-header bg-secondary text-white text-center">
                            <small><i class="fa fa-filter"></i> {{__('t.filter')}}</small>
                        </div>
                        <div class="card-body" style="overflow: auto;height: 450px;">
                            <p>{{__('Categories')}}
                                <span class=" badge rounded-pill1 bg-danger text-white">
                                 {{$categories->count()}}</span>
                            </p>
                            <hr>

                            <div class="col-12">
                            {{--Service list--}}
                                @foreach($categories as $val)
                                    <ol class="text-primary text-right" style="list-style-type: none;margin-right: -40px">
                                       <li>{{$val->name}}
                                           <span class=" badge rounded-pill bg-dark text-white">
                                        {{$val->child->count()}}
                                    </span>
                                       </li>

                                    </ol>
                                        @if($val->child->count())
                                            {{--                <div class="form-check p-1 mr-3">--}}
                                            {{--                    <input class="" type="checkbox" value="{{$child->id}}" id="{{$child->id}}-flexCheckDefault"  wire:model="filter_check">--}}
                                            {{--                    <label class="form-check-label" for="{{$child->id}}-flexCheckDefault">--}}
                                            {{--                        {{$child->name}}--}}
                                            {{--                    </label>--}}
                                            {{--                </div>--}}
{{--                                            @livewire('site-service-list-child',['categories'=>$child])--}}
{{--                                            <livewire:site-service-list-child :categories="$val">--}}
                                            @include('livewire.site.site-service-list-child',['categories' => $val])
                                        @endif


                                @endforeach

                            </div>
                            <hr>
                            <div class="form-check">
                                <button type="button" class="btn btn-danger" wire:click.prevent="clear_check">{{__('Clear All')}}</button>

                            </div>
                            <div class="form-check" hidden>
                                <input class="" type="checkbox" value="{{($filter_check ? 'true' :'false')}}" id="flexCheckDefault"  wire:model="filter_check_all" >
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{__('t.seeall')}}
                                </label>
                            </div>
{{--                            {{var_export($filter_check_1)}}--}}
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12">
                    <div class="">
                        <div wire:loading.inline wire:target="filter_check">
                            <div class="spinner-border text-warning" role="status">

                            </div>
                        </div>
                        {{--<div class="card-header text-center bg-transparent p-3">{{ __('Companies') }}</div>--}}
                        <div class="card-body">

                            @isset($companies)
{{--                                {{dd((json_decode($companies)))}}--}}
{{--                                {{dd(($companies_service))}}--}}
                                <div class="row">
                                    @foreach($companies as $val)
                                        <div class="p-4 m-3 col-lg-3 col-md-5 col-sm-5 text-center shadow-lg position-relative">
                                            @if($val->rate >= 6)
                                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger text-white">
                                                {{__('Special')}}
                                              </span>
                                            @endif
                                                <img src="{{asset('storage/'.$val->logo)}}" class="rounded-circle" style="height: 60px;width: 60px" alt="">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <span>{{$val->name}}</span>
                                                    </div>
                                                    <div class="col-12">
                                                        <small>{{$val->about}}</small>
                                                    </div>
                                                    <div class="col-12">
                                                        <small class="text-danger">{{$val->company_type->name}}</small>
                                                    </div>
                                                    <div class="col-12 mt-2">
                                                        <a href="" class=""></a>
                                                        <div class="nav-item dropdown">
                                                            <span class="nav-link dropdown-toggle btn btn-outline-primary btn-sm"  data-toggle="dropdown"> {{__('Order a service')}} </span>
                                                            <div class="dropdown-menu text-center">
                                                                {{--                                                            {{dd(json_decode($val->company_service))}}--}}
                                                                @foreach($val->company_service as $cs)
                                                                    <a href="{{route('site.orders',$cs->id)}}" class="dropdown-item  {{$cs->status == 1 ?'' : 'd-none'}} {{$cs->categories->status == 1 ?'' : 'd-none'}}"><i class="fa-solid fa-plus"></i> {{$cs->categories->name}}</a>
                                                                @endforeach

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                        </div>

                                    @endforeach
                                </div>

                            @endisset
                        </div>
                    </div>
                    <div class="card-footer bg-transparent">
{{--                        {{$companies->links()}}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{--<script>--}}
{{--    document.addEventListener("livewire:load", () => {--}}
{{--        @this.on('order_sendit', () => {--}}
{{--            new Audio("{{url('asset/img/new-not.mp3')}}").play();--}}
{{--        })--}}
{{--    });--}}


{{--</script>--}}

{{--<script>--}}
{{--    window.addEventListener("livewire:load", function () {--}}
{{--        Livewire.emit("orderSend");--}}
{{--    });--}}
{{--</script>--}}
