<div>
    @section('title') {{ Auth::user()->name }}@endsection
    @include('message')
    {{--    Heding Page--}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{__('t.dashboard')}}</h1>

        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-money-bill-alt  fa-sm text-white-50"> </i> {{__('Account Balance')}} : {{$balance->sum('price') == 0 ? __('there is no credit') : $balance->sum('price') .' '. __('SAR')}}  </a>

    {{-- <button class="btn btn-primary" wire:click="play">paly</button> --}}
    </div>

{{--    <div class="input-group">--}}
{{--            <div class="dropdown no-arrow p-3">--}}
{{--                <a class="dropdown-toggle text-decoration-none" href="#" role="button" id="dropdownMenuLink"--}}
{{--                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                    <i class="fas fa-calendar-alt"></i>--}}

{{--                 {{__('t.filter')}}--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"--}}
{{--                     aria-labelledby="dropdownMenuLink">--}}
{{--                    <div class="dropdown-header">Dropdown Header:</div>--}}
{{--                    @forelse($labels as $label)--}}
{{--                        <a class="dropdown-item" href="#" wire:model="month"> <i class="fas fa-dot-circle"></i> {{$label}}</a>--}}
{{--                    @empty--}}
{{--                        <a class="dropdown-item text-danger">   {{__('No Data')}}</a>--}}
{{--                    @endforelse--}}

{{--                </div>--}}
{{--            </div>--}}
{{--    </div>--}}
    {{--End of Heading Page--}}

    {{--    Content--}}
<!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                {{__('Daily Orders')}}
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{$daily_orders > 0 ? $daily_orders : __('No Data')}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                {{__('Earnings (Annual)')}}
                                {{--                            {{__('Earnings (Monthly)')}}--}}
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data->sum() > 0 ? $data->sum() ." " . __('SAR') : __('there is no credit')}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                {{__('Pending Requests')}}
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$pending_orders > 0 ? $pending_orders : __('No Data')}}</div>
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

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">{{__('Earnings Overview')}}</h6>
                    {{--                <div class="dropdown no-arrow">--}}
                    {{--                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"--}}
                    {{--                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                    {{--                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>--}}
                    {{--                    </a>--}}
                    {{--                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"--}}
                    {{--                         aria-labelledby="dropdownMenuLink">--}}
                    {{--                        <div class="dropdown-header">Dropdown Header:</div>--}}
                    {{--                        <a class="dropdown-item" href="#">Action</a>--}}
                    {{--                        <a class="dropdown-item" href="#">Another action</a>--}}
                    {{--                        <div class="dropdown-divider"></div>--}}
                    {{--                        <a class="dropdown-item" href="#">Something else here</a>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        @if($data->count())
                            <canvas id="myAreaChart_1"></canvas>
                        @else
                            <div class="row">
                                <div class="col-lg-12">
                                    <img src="{{asset('asset/img/nodata.png')}}" class="w-25 rounded mx-auto d-block" alt="">
                                </div>
                                <div class="col-lg-6">

                                </div>
                            </div>


                        @endif

                    </div>
                </div>
            </div>
        </div>




    </div>

    {{--End of   Content--}}
</div>

<script>
    document.addEventListener("livewire:load", () => {
        @this.on('commentUpdated', () => {
            new Audio("{{url('asset/img/new-not.mp3')}}").play();
        })
    });
</script>
@section('js')
    <script src="{{asset('asset/admin/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('asset/admin/js/demo/chart-pie-demo.js')}}"></script>
    <script>

        var labels =  {{ Js::from($labels) }};
        var data =  {{ Js::from($data) }};
        // Area Chart Example
        var ctx = document.getElementById("myAreaChart_1");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                //
                labels: labels,
                datasets: [{
                    label: "{{__('Earning')}}",
                    lineTension: 0.1,
                    backgroundColor: "rgba(78, 115, 223, 0.05)",
                    borderColor: "rgba(78, 115, 223, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointBorderColor: "rgba(78, 115, 223, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: data,
                    //
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 4,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return '' + number_format(value);
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return  number_format(tooltipItem.yLabel) + ' {{__('SAR')}}  ' ;
                        }
                    }
                }
            }
        });
    </script>
@endsection


