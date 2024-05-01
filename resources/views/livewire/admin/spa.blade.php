<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-center bg-dark text-white">{{__('t.reservation')}}</div>
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
                                        <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas"
                                                data-bs-target="#offcanvasWithBackdrop" aria-controls="offcanvasWithBackdrop">
                                            <i class="fa fa-filter"></i> {{ __('t.filter') }}</button>
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
{{--                                <form >--}}
{{--                                    <div class="input-group mb-3 p-2">--}}
{{--                                        <div class="form-check form-switch">--}}
{{--                                            <input class="form-check-input" wire:model="status" type="checkbox" id="flexSwitchCheckChecked" checked>--}}
{{--                                            <label class="form-check-label" for="flexSwitchCheckChecked">{{__('Status')}}</label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <hr>--}}
{{--                                </form>--}}
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
                                    <th scope="col"><i class="fa fa-file-archive"></i> {{__('t.attachment')}}</th>
{{--                                    <th scope="col"><i class="fa fa-cogs"></i> {{__('Status')}}</th>--}}
                                    <th scope="col"><i class="fa fa-check"></i> {{__('Approvals')}}</th>
                                    <th scope="col"><i class="fa fa-eye"></i> </th>
                                    <th scope="col"><i class="fa fa-clock"></i> {{__('t.date')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($spa as $val)

                                    <tr class="{{$val->approve == 1 ? 'bg-danger text-white' :''}}">
                                        <th class="bg-dark text-white" scope="row">{{$val->id}}</th>
                                        <td>{{$val->name}}</td>
                                        <td><button class="btn btn-primary btn-sm" wire:click="export({{$val->id}})"><i class="fa fa-download"></i></button></td>
{{--                                        <td>--}}
{{--                                            @if($val->approve != 1)--}}
{{--                                                @livewire('switcher', ['model' => $val, 'field' => 'status'], key($val->id))--}}
{{--                                            @else--}}
{{--                                                <span>{{__('Reject')}}</span>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
                                        <td>
                                            @if($val->approve != null)
                                                @if($val->approve == 0)
                                                    {{__('Approved')}}
                                                @else
                                                    {{__('Reject')}}
                                                @endif
                                            @else
                                                <div class="dropdown" >
                                                    <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas fa-list-alt"></i>
                                                    </button>
                                                    <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton1">
                                                        <li><a class="dropdown-item bg-success text-white" wire:click.prevent="spa_action({{$val->id}} , 'approve')"><i class="fa fa-check"></i> {{__('Approved')}}</a></li>
                                                        <li><a class="dropdown-item bg-danger text-white" wire:click.prevent="spa_action({{$val->id}} , 'error')"><i class="fa fa-times"></i> {{__('Reject')}}</a></li>
                                                    </ul>
                                                </div>
                                            @endif

                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="fa fa-file"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" dir="ltr">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{__('t.disc')}}</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body text-center">
                                                                    {{__('t.email')}} <p>{{$val->email}}</p>
                                                                    {{__('t.phone')}} <p>{{$val->phone}}</p>
                                                                    {{__('t.disc')}} <p class="">{{$val->disc}}</p>
                                                                    {{__('t.type_work')}} <p class="">{{$val->companies_types->name}}</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Close')}}</button>
{{--                                                            <button type="button" class="btn btn-primary">Save changes</button>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{\Carbon\Carbon::parse($val->created_at)->getTranslatedDayName()}}
                                        {{\Carbon\Carbon::parse($val->created_at)->format('Y-m-d')}}
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
                   <span class="p-3">{{$spa->links()}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
