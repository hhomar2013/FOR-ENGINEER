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
                                <div class="col-lg-5">
                                    <img src="{{ asset('asset/img/team/team-1.jpg') }}" alt="" class="rounded-pill w-50" >
                                </div>
                                <div class="col-lg-7">
                                    <p class="py-3 text-capitalize"><b>{{ Auth::user()->name }}</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 py-3">
                        {{-- <ul class="list-group rounded-3 text-center">
                            <li class="list-group-item active" aria-current="true">An active item</li>
                            <li class="list-group-item">A second item</li>
                            <li class="list-group-item">A third item</li>
                            <li class="list-group-item">A fourth item</li>
                            <li class="list-group-item">And a fifth one</li>
                          </ul> --}}
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
                                            {{ __('Requests in the bidding stage') }}
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
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                  </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">3</th>
                                    <td colspan="2">Larry the Bird</td>
                                    <td>@twitter</td>
                                  </tr>
                                </tbody>
                              </table>
                        </div>

                    </div>
                </div>

            </div>
            {{-- End Left --}}

        </div>{{-- End Row --}}
    </div>{{-- End Container --}}
</div>
