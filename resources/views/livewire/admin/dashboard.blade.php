<div wire:poll="order">
    {{--    Heding Page--}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{__('t.dashboard')}}</h1>
{{--        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i--}}
{{--                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>--}}
    </div>
    {{--End of Heading Page--}}

    {{--    Content--}}
<!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{__('Companies')}}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$companies_count}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-building fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                {{__('Earnings (Annual)')}}
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$annual}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-wallet fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                {{ __('Earnings (Monthly)') }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $monthly }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-wallet fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                {{ __('t.reservation') }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $reservation }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <hr>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h5 class=" mb-0 text-gray-800">{{__('Orders')}}</h5>
            {{--        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i--}}
            {{--                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>--}}
        </div>
        {{-- wire:poll.5s="refresh_page" --}}
        <div class="table-responsive-sm" >
            <table class="table table-bordered  table-hover table-sm text-center">
                <thead>
                <tr class="bg-dark text-white" >
                    <th scope="col"><i class="fa fa-list"></i></th>
                    <th scope="col"><i class="fa fa-user-circle"></i> {{__('From')}}</th>
                    <th scope="col"><i class="fa fa-building"></i> {{__('To')}} - {{__('Company')}}</th>
                    <th scope="col"><i class="fa fa-server"></i> {{__('Service')}}</th>
                    <th scope="col"><i class="fa fa-clock"></i> {{__('t.date')}}</th>
                </tr>
                </thead>
                <tbody>
                <?php $i =1; $ii =1; ?>
                @forelse($orders as $val)
                                @if($val['status'] == 4)
                                    <tr class="bg-danger text-white text-decoration-line-through">
                                @endif
                                <th class="bg-secondary text-white">
                                    <a href="" class="text-decoration-none text-white">{{$val['order_ref']}}</a>
                                </th>
                                <td> {{$val->users->name}} </td>
                                <td> {{$val->companies_service->company->name}} </td>
                                <td> {{$val->companies_service->categories->name}} </td>
                                <td>{{\Carbon\Carbon::parse($val->updated_at)->getTranslatedDayName()}}
                                    {{\Carbon\Carbon::parse($val->updated_at)->format('Y-m-d')}}
                                </td>

                            </tr>
                @empty
                @endforelse

                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <button type="submit" wire:click="order" class="btn btn-primary">play</button>
        <audio id="audioPlayer" src="{{ asset("asset/admin/sound/notification.mp3") }}"></audio>

        <!-- Area Chart -->
{{--        <div class="col-xl-12 col-lg-12" >--}}
{{--            <div class="card shadow mb-4">--}}
{{--                <!-- Card Header - Dropdown -->--}}
{{--                <div--}}
{{--                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">--}}
{{--                    <h6 class="m-0 font-weight-bold text-primary">{{__('Earnings Overview')}}</h6>--}}
{{--                    <div class="dropdown no-arrow">--}}
{{--                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"--}}
{{--                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>--}}
{{--                        </a>--}}
{{--                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"--}}
{{--                             aria-labelledby="dropdownMenuLink">--}}
{{--                            <div class="dropdown-header">Dropdown Header:</div>--}}
{{--                            <a class="dropdown-item" href="#">Action</a>--}}
{{--                            <a class="dropdown-item" href="#">Another action</a>--}}
{{--                            <div class="dropdown-divider"></div>--}}
{{--                            <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- Card Body -->--}}
{{--                <div class="card-body">--}}
{{--                    <div class="chart-area">--}}
{{--                        <canvas id="myAreaChart_1"></canvas>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}


    </div>


    {{--End of   Content--}}
</div>



@push('js')
    <!-- Page level plugins -->
{{--    <script src="{{asset('asset/admin/vendor/chart.js/Chart.min.js')}}"></script>--}}
    <!-- Page level custom scripts -->


    {{-- <script>
        document.addEventListener('livewire:load', function () {
           @this.on('$refresh' ,() =>{
                alert('dashboard')
           })
        })
    </script> --}}


    <script>
        window.addEventListener('send_order', (event) => {
            new Audio("{{url('storage/sound/notification.mp3')}}").play();
        })
    </script>

    <script>
           window.addEventListener('send_order_message' , (event)=> {
            Toast.fire({icon: 'success',title:'{{ __("You Have New Order") }}'});
        })
    </script>
@endpush
