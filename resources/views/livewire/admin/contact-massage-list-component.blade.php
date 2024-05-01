<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-center bg-dark text-white">{{__('inquiries')}}</div>
                    <div class="card-body">
                        @include('message')
                        <div class="row shadow p-3 mb-3 bg-body rounded">
                            {{-- <div wire:poll.keep-alive>
                                Current time: {{ now() }}
                            </div> --}}


                            <div class=" col-lg-3 col-md-6 col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-text bg-dark text-white">{{ __('t.pages') }}</span>
                                    <select class="form-select-sm" wire:model="numbers" wire:change="pages_num">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>

                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
{{--                                    <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas"--}}
{{--                                            data-bs-target="#offcanvasWithBackdrop" aria-controls="offcanvasWithBackdrop">--}}
{{--                                        <i class="fa fa-filter"></i> {{ __('t.filter') }}--}}
{{--                                    </button>--}}
                                </div>
                                <hr>
                            </div>

{{--                            <div class="col-md-6 ">--}}
{{--                                <div class="input-group ">--}}
{{--                                    <span class="input-group-text bg-dark text-white"><i class="fa fa-search"></i></span>--}}
{{--                                    <input type="text" name="" id="search" class="form-control" wire:model="search"/>--}}
{{--                                </div>--}}
{{--                                <hr>--}}
{{--                            </div>--}}
                            <!--End of search  -->

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
                                <form >
                                    <div class="input-group mb-3 p-2">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" wire:model="status" type="checkbox" id="flexSwitchCheckChecked" checked>
                                            <label class="form-check-label" for="flexSwitchCheckChecked">{{__('Status')}}</label>
                                        </div>
                                    </div>
                                    <hr>
                                </form>
                            </div>
                        </div>
                        {{--End OffCanvas --}}

                        @include('load')
                        <div class="table-responsive-sm">
                            <table class="table table-bordered  table-hover table-sm text-center ">
                                <thead>
                                <tr class="bg-dark text-white" >
                                    <th scope="col"><i class="fa fa-list"></i></th>
                                    <th scope="col"><i class="fa fa-user-alt"></i> {{__('t.name')}}</th>
                                    <th scope="col"><i class="fa fa-check"></i> {{__('t.email')}}</th>
                                    <th scope="col"><i class="fa fa-check"></i> {{__('subject')}}</th>
                                    <th scope="col"><i class="fa fa-check"></i> {{__('t.statue')}}</th>
                                    <th scope="col"><i class="fa fa-eye"></i> </th>
                                    <th scope="col"><i class="fa fa-clock"></i> {{__('t.date')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($cml as $val)

                                    <tr >
                                        <th class="bg-dark text-white" scope="row">{{$val->id}}</th>
                                        <td>{{$val->name}}</td>
                                        <td>{{$val->email}}</td>
                                        <td>{{$val->subject}}</td>
{{--                                        <td><button class="btn btn-primary btn-sm" wire:click="export({{$val->id}})"><i class="fa fa-download"></i></button></td>--}}
                                        <td>
                                            <div class="dropdown" >
                                                <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    @if($val->status == 0)
                                                        {{__('under review')}}
                                                    @elseif($val->status == 1)
                                                        {{__('answered')}}
                                                    @elseif($val->status == 2)
                                                        {{__('Reject')}}
                                                    @endif
                                                </button>
                                                <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton1">
                                                    <li><a class="dropdown-item {{$val->status == 0 ? 'active disabled' :''}}" wire:click.prevent="cml_action({{$val->id}} , 'under_review')">  {{__('under review')}}</a></li>
                                                    <li><a class="dropdown-item  {{$val->status == 1 ? 'active disabled' :''}}" wire:click.prevent="cml_action({{$val->id}} , 'answered')"> {{__('answered')}}</a></li>
                                                    <li><a class="dropdown-item {{$val->status == 2 ? 'active disabled' :''}}" wire:click.prevent="cml_action({{$val->id}} , 'Reject')">{{__('Reject')}}</a></li>
                                                </ul>
                                            </div>

                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$val->id}}">
                                                <i class="fas fa-envelope-open-text"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal-{{$val->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" dir="ltr">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{__('inquiries')}}</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body  {{app()->getLocale() == 'ar' ? 'text-left' : ''}}">
                                                            {{__('Message')}} <p>{{$val->message}}</p>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Close')}}</button>
                                                            {{--                                                            <button type="button" class="btn btn-primary">Save changes</button>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{\Carbon\Carbon::parse($val->updated_at)->getTranslatedDayName()}}
                                            {{\Carbon\Carbon::parse($val->updated_at)->format('Y-m-d')}}
                                        </td>
                                    </tr>
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
                    <span class="p-3">{{$cml->links()}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
