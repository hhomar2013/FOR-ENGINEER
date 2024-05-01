<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-center bg-dark text-white">{{__('Orders')}}</div>
                    <div class="card-body">
                        @include('message')
                        <div class="row shadow p-3 mb-3 bg-body rounded">

                            <div class=" col-lg-3 col-md-6 col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-text bg-dark text-white">{{ __('t.pages') }}</span>
                                    <select class="form-select-sm" wire:model="numbers" wire:change="pages_num">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="50">50</option>
                                    </select>

                                    {{--                                    <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas"--}}
                                    {{--                                    data-bs-target="#offcanvasWithBackdrop" aria-controls="offcanvasWithBackdrop">--}}
                                    {{--                                    <i class="fa fa-filter"></i> {{ __('t.filter') }}</button>--}}
                                </div>
                                <hr>
                            </div>

                            <div class="col-md-6 ">
                                <div class="input-group ">
                                    <span class="input-group-text bg-dark text-white"><i class="fa fa-search"></i></span>
                                    <input type="text" name="" id="search" class="form-control" wire:model="search"/>
                                </div>
                                <hr>
                            </div><!--End of search  -->

                        </div>

                        {{-- OffCanvas --}}
                        <div class="offcanvas offcanvas-start bg-dark text-white" tabindex="-1" id="offcanvasWithBackdrop" aria-labelledby="offcanvasWithBackdropLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasWithBackdropLabel"><i class="fa fa-filter"></i> {{ __('t.filter') }}</h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <p>{{ __('t.date') }}</p>

                                <form wire:submit.prevent="filter_date">
                                    <div class="input-group mb-3">
                                        <input type="date" class="form-control"  wire:model.defer="date_from"/>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-filter"></i></button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        {{--End OffCanvas --}}

                        <div class="table-responsive-sm">
                            @include('load')
                            <table class="table table-bordered table-hover table-sm text-center">
                                <thead>
                                <tr class="bg-dark text-white" >
                                    <th scope="col"><i class="fa fa-list"></i></th>
                                    <th scope="col"><i class="fa fa-code-branch"></i> {{__('Service')}}</th>
                                    <th scope="col"><i class="fa fa-money-bill-alt"></i> {{__('price')}}</th>
                                    <th scope="col"><i class="fa fa-user-circle"></i> {{__('From')}}</th>
                                    <th scope="col"><i class="fa fa-building"></i> {{__('To')}} - {{__('Company')}}</th>
                                    <th scope="col"><i class="fa fa-clock"></i> {{__('t.date')}}</th>
                                    <th scope="col"><i class="fa fa-cogs"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($orders as $val)
                                    @if($val['status'] == 4)
                                        <tr class="text-decoration-line-through text-white bg-danger">
                                    @endif

                                        <th class="bg-dark text-white" scope="row">{{$val->order_ref}}</th>
                                        <td>{{$val->companies_service->categories->name}}</td>
                                        <td>{{$val->price .' ' . __('SR')}} </td>
                                        <td>{{$val->users->name}}</td>
                                        <td> {{$val->companies_service->company->name}} </td>
                                        <td>{{\Carbon\Carbon::parse($val->created_at)->getTranslatedDayName()}}
                                            {{\Carbon\Carbon::parse($val->created_at)->format('Y-m-d')}}
                                        </td>
                                            <td> <a class="text-decoration-none text-black-50" data-toggle="modal" data-target="#exampleModal-{{$val->order_ref}}"><i class="fa fa-user-circle"></i></a></td>
                                    </tr>
                                        {{--Start OffCanvas--}}
                                        <!-- Button trigger modal -->
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal-{{$val->order_ref}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">{{__('Details')}} - {{$val->order_ref}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4>المستخدم</h4>
                                                        <hr>
                                                       <span> {{$val->users->email}}</span>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{--End OffCanvas--}}
                                @empty
                                    <tr>
                                        <td class="text-danger" colspan="6" scope="row">{{__('There is no data')}}</td>
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
</div>
