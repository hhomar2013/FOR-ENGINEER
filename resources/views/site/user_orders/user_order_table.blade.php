<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header text-center bg-dark text-white">{{__('Orders')}} <span class="badge text-bg-warning">{{$orders->count() > 0 ? $orders->count() : ''  }}</span></div>
                <div class="card-body">
                    <div class="row shadow p-3 mb-3 bg-body rounded">
                        {{-- <div wire:poll.keep-alive>
                            Current time: {{ now() }}
                        </div> --}}
                        {{--                            @include('message')--}}

                        <div class=" col-lg-12 col-md-12 col-sm-12">
                            <div class="input-group">

                                <div>
                                    <span class="input-group-text bg-dark text-white">{{ __('t.statue') }}</span>
                                    <select class="form-control" wire:model="status" wire:change="pages_num">
                                        <option value="{{''}}">الكل</option>
                                        <option value="0">{{__('Under collection')}}</option>
                                        <option value="1">{{__('Collected')}}</option>
                                        <option value="2">{{__('refunded')}}</option>
                                    </select>
                                </div>

                                <div>
                                    <span class="input-group-text bg-dark text-white">{{ __('t.pages') }}</span>
                                    <select class="form-control" wire:model="numbers" wire:change="pages_num">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>

                                </div>

                                <div>
                                    <span class="input-group-text bg-dark text-white">{{ __('t.date') }}</span>
                                    <input type="date" class="form-control" wire:model="date" wire:change="pages_num"/>
                                </div>

                            </div>
                            <hr>
                        </div>

                    </div>

                    <div class="table-responsive-sm">
                        <table class="table table-bordered table-responsive-sm table-hover table-sm text-center ">
                            <thead>
                            <tr class="bg-dark text-white" >
                                <th scope="col"><i class="fa fa-list"></i></th>
                                <th scope="col"><i class="fa fa-sitemap"></i></th>
                                <th scope="col">{{__('Status')}}</th>
                                <th scope="col"><i class="fa fa-clock"></i> {{__('t.date')}}</th>
                                <th scope="col"><i class="fa fa-cogs"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i =1; $ii =1; ?>
                            @forelse($orders as $val)
                                <tr class="{{$val->status == 3 ?'text-white bg-info' : ''}} {{$val->status == 4 ?'text-white bg-danger' : ''}}">
                                    <td class="" scope="row">{{$val->order_ref}}</td>
                                    <td  scope="row">{{ $val->name }}</td>
                                    @if($val->status == 0)
                                        <td class="text-danger"  scope="row">{{ __('Under collection')}}</td>
                                    @elseif($val->status == 1)
                                        <td class=" text-success"  scope="row">{{ __('Collected')}}</td>
                                    @elseif($val->status == 2)
                                        <td class="text-warning"  scope="row">{{ __('refunded')}}</td>
                                    @elseif($val->status == 3)
                                        <td class="text-white"     scope="row">{{ __('Request Ended')}}</td>
                                    @elseif($val->status == 4)
                                        <td class="text-white"     scope="row">{{ __('Deleted')}}</td>
                                    @elseif($val->status == 5)
                                        <td class="text-warning"     scope="row">{{ __('Have a Invoice')}}</td>
                                    @elseif($val->status == 6)
                                        <td class="text-success"     scope="row">{{ __('Invoice Collected')}}</td>
                                    @elseif($val->status == 7)
                                        <td class="text-danger"     scope="row">{{ __('Invoice Rejected')}}</td>
                                    @elseif($val->status == 8)
                                        <td class="text-info"     scope="row">{{ __('Order Has Comment')}}</td>
                                    @endif
                                    <td  scope="row">
                                        {{\Carbon\Carbon::parse($val->updated_at)->getTranslatedDayName()}}
                                        {{\Carbon\Carbon::parse($val->updated_at)->format('Y-m-d')}}
                                        {{--{{\Carbon\Carbon::parse($val->updated_at)->toTimeString()}}--}}
                                    </td>
                                    <td>
                                    @if($val->status == 0)
                                            <a href="{{route('pay',['amount'=>$val->price * 100,'id'=>$val->order_ref])}}" class="btn btn-primary p-1"><i class="fa fa-wallet"></i> {{__('Pay Now')}}</a>
                                            |  <button onclick="destroy({{ $val->id }})" class="btn btn-outline-danger"><i class="fa fa-times-circle"></i> </button>
                                        @elseif($val->status == 1)
                                            <button wire:click="show_order({{$val->id}})" class="btn btn-outline-info p-1"><i class="fa fa-eye"></i> {{__('Show Order')}}</button>
                                        @elseif($val->status == 8)
                                            <button wire:click="show_order({{$val->id}})" class="btn btn-outline-info p-1"><i class="fa fa-eye"></i> {{__('Show Comment')}}</button>
                                        @elseif($val->status == 5)
                                            <button wire:click="show_paid({{$val->order_ref}})" class="btn btn-outline-warning p-1"><i class="fa fa-file-invoice"></i> {{__('Show Invoice')}}</button>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-danger" colspan="5" scope="row">{{__('There is no data')}}</td>
                                </tr>
                            @endforelse


                            </tbody>
                        </table>
                    </div>

                </div>
                <hr>
                <span class="p-3">{{$orders->links()}}</span>
            </div>
        </div>
    </div>
</div>
