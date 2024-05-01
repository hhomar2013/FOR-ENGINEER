
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card {{app()->getLocale() == 'ar' ? 'text-right' : 'text-left'}}">
                <div class="card-header text-center bg-dark text-white">{{__('Show Order')}} </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 ">
                            <h4>{{$category_name}}</h4>
                            <hr>
                            <div class="row">
                                    <div class="p-4 m-3 col-lg-2 col-md-4 col-sm-6 text-center  position-relative">
                                        <img src="{{asset('asset/img/logo2.png')}}" class="rounded-circle" style="height: 60px;width: 60px" alt="">                                        <p class="text-success">{{$order_table->users->name}} </p>
                                        <small class="text-danger">{{\Carbon\Carbon::parse($order_table->updated_at)->diffForHumans()}}</small>
                                    </div>
                                <div class="p-4 m-3 col-lg-9 col-md-6 col-sm-6 h-auto  shadow-lg ">
                                    <small class="">{!! $details_show !!}</small>
                                </div>
                            </div>



                        </div>

                        <div class="col-lg-12 col-sm-12">
                            <hr>
                            @foreach($order_table->orderComments as $order)
                                <div class="row">


                                    <div class="p-4 m-3 col-lg-9 col-md-6 col-sm-6 h-auto  shadow-lg position-relative">
                                        <small>{!! $order->comment !!}</small>
                                        <hr>
                                        <small class="text-left">{{\Carbon\Carbon::parse($order->created_at)->diffForHumans()}}</small>
                                    </div>

                                    <div class="p-4 m-3 col-lg-2 col-md-4 col-sm-6 text-center  position-relative">
                                        <img src="{{asset('storage/'.$order->company->logo)}}" class="rounded-circle" style="height: 60px;width: 60px" alt="">
                                        <div class="row">
                                            <div class="col-12">
                                                <span>{{$order->company->name}}</span>
                                            </div>
                                        </div>
                                    </div>


                                </div>


                            @endforeach

                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <button class="btn btn-outline-warning text-start" wire:click.prevent="back_to_table"><i class="fas fa-backward"></i> {{__('Back')}}</button>
                </div>
            </div>

        </div>
    </div>
</div>
