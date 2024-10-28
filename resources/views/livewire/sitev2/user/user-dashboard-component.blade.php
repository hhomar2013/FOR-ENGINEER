@section('title'){{ __('Dashboard') }}@endsection
@section('page_title')@include('site_tools_v2.page_title',['main_title'=>__('Dashboard') ,'no'=>true])@endsection
<div class="" style="background-color: #eaecec">
    <div class="container-fluied p-3">
        <div class="row mt-3 mb-5 mx-md-0">
            {{-- Start Right --}}
            <div class="col-lg-3  pb-2">
                {{-- Start Row --}}
                <div class="row">
                    <div class="col-12">
                        <div class="bg-white rounded-3 px-3 py-3 text-center">
                            <div class="row">
                                <div class="col-lg-5 pt-2">
                                    <img src="{{ Auth::user()->img != null ? asset('storage/' . Auth::user()->img) : asset('asset/img/for.gif') }}" alt="" class="rounded-pill w-50 " >
                                </div>
                                <div class="col-lg-7 pt-3">
                                    <p class="py-3 text-capitalize text-center"><b>{{ Auth::user()->name }}</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 py-3">
                        <div class="card border-0">
                            <div class="card-body">
                                <h5 class="card-title "><i class="fa-solid fa-medal"></i> &nbsp;{{ __('Medals') }} <hr></h5>
                                <p class="card-text">
                                    <div class="row">
                                    @foreach ($medals as $medal )
                                        <div class="col-lg-4 text-center">
                                            <img src="{{ asset('storage/' . $medal->img) }}" alt="" class="w-75 h-75">
                                            <br>
                                            <b style="font-size: 11px">{{ $medal->name }}</b>
                                        </div>

                                    @endforeach
                                    </div>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>{{-- End Row --}}
            </div>{{-- End Right --}}
            {{-- Start Left --}}
            <div class="col-lg-9">
                <div class="row">
                    {{-- Start --}}
                    <div class="col-lg-3 col-sm-12 pb-2">
                        <div class="card border border-0 shadow text-light rounded-4" style="background-color:var(--orange-color)">
                            <div class="card-body ">
                                <div class="row">
                                    <h3 class="card-title">
                                        <i class="fa-solid fa-clock-rotate-left"></i>
                                    </h3>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p>
                                           <small>{{ __('Requests in the bidding stage') }}</small>
                                        </p>
                                    </div>
                                    <div class="col-6 text-center">
                                        <h3 class="text-light"><b>{{ $newRequest->where('status',0)->count() }}</b></h3>
                                        <p>{{ __('pending') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>{{--End--}}

                    {{-- Start --}}
                    <div class="col-lg-3 col-sm-12 pb-2">
                        <div class="card border border-0 shadow text-light rounded-4" style="background-color:var(--blue-color)">
                            <div class="card-body">
                                <div class="row">
                                    <h3 class="card-title">
                                        <i class="fa-solid fa-gear"></i>
                                    </h3>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p>
                                            {{ __('Requests in the bidding stage') }}
                                        </p>
                                    </div>
                                    <div class="col-6 text-center">
                                        <h3 class="text-light"><b>{{ $newRequest->where('status',"In progress")->count() }}</b></h3>
                                        <p>{{ __('In progress') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>{{--End--}}

                    {{-- Start --}}
                    <div class="col-lg-3 col-sm-12 pb-2">
                        <div class="card border border-0 shadow text-light rounded-4" style="background-color:var(--green-color)">
                            <div class="card-body">
                                <div class="row">
                                    <h3 class="card-title">
                                        <i class="fa-solid fa-circle-check"></i>
                                    </h3>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p>
                                            {{ __('Orders delivered') }}
                                        </p>
                                    </div>
                                    <div class="col-6 text-center">
                                        <h3 class="text-light"><b>{{ $newRequest->where('status',"Completed")->count() }}</b></h3>
                                        <p>{{ __('Completed') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>{{--End--}}

                    {{-- Start --}}
                    <div class="col-lg-3 col-sm-12 pb-2">
                        <div class="card border border-0 shadow text-light rounded-4" style="background-color: var(--red-color)">
                            <div class="card-body">
                                <div class="row">
                                    <h3 class="card-title">
                                        <i class="fa-solid fa-circle-xmark"></i>
                                    </h3>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p>
                                            {{ __('Cancelled requests') }}
                                        </p>
                                    </div>
                                    <div class="col-6 text-center">
                                        <h3 class="text-light"><b>{{ $newRequest->where('status',"Cancelled")->count() }}</b></h3>
                                        <p>{{ __('Cancelled') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>{{--End--}}
                </div>
                <br/>
                <div class="col-12">
                    <div class="card border border-0 ">
                        <div class="card-header" style="background-color:var(--blue-color)">
                            <h5 class="p-2 text-light">{{ __('Your Orders') }}</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-striped table-bordered  table-responsive-sm table-sm">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __('reference number') }}</th>
                                    <th scope="col">{{ __('Description') }}</th>
                                    <th scope="col"><i class="fa fa-cogs"></i></th>
                                  </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    <?php $i=1 ?>
                                 @forelse ($pages as $value )
                                 <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $value->order_refrence }}</td>
                                    <td>{{ $value->order_title }}</td>
                                    <td><a href="{{  route('user.show.request',['id'=>$value->id]) }}" aria-placeholder="{{ __('Show Comment') }}"
                                        class="btn text-white rounded-4 bg-text-light" style="background-color:var(--blue-color)">
                                        <i class="fa-regular fa-folder-open"></i></td>
                                  </tr>
                                  @empty
                                  <tr class="text-center ">
                                        <td colspan="4" class="text-danger">
                                            <b>{{ __('No Data') }}</b>

                                        </td>
                                  </tr>
                                 @endforelse

                                </tbody>
                              </table>
                        </div>
                        <div class="card-footer">
                            {{ $pages->links() }}
                        </div>

                    </div>
                </div>

            </div>
            {{-- End Left --}}

        </div>{{-- End Row --}}
    </div>{{-- End Container --}}
</div>
