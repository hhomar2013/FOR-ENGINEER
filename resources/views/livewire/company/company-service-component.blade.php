<div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{__('Your Services')}}</h1>
        {{--        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i--}}
        {{--                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>--}}
    </div>
    @include('message')
    @if(!$update)
        @include('livewire.company.add-company-service-component')
    @else
        @include('livewire.company.update-company-service-component')
    @endif


    {{--Table--}}
    <div class="row shadow p-3 mb-3 bg-body rounded">
        {{-- <div wire:poll.keep-alive>
            Current time: {{ now() }}
        </div> --}}


        <div class=" col-lg-3 col-md-6 col-sm-12">
            <div class="input-group">
                <div class="input-group-append">

                </div>
                <div class="input-group-append">
                    <span class="input-group-text bg-dark text-white">{{ __('t.pages') }}</span>
                    <select class="form-select-sm" wire:model="numbers" wire:change="pages_num">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                    </select>

                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                {{--                                    <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas"--}}
                {{--                                            data-bs-target="#offcanvasWithBackdrop" aria-controls="offcanvasWithBackdrop">--}}
                {{--                                        <i class="fa fa-filter"></i> {{ __('t.filter') }}</button>--}}
            </div>
            <hr>
        </div>

        <div class="col-md-6 ">
            <div class="input-group-append">
                <span class="input-group-text bg-dark text-white"><i class="fa fa-search"></i></span>
                <input type="text" name="" id="search" class="form-control" wire:model="search"/>

            </div>
            <hr>
        </div><!--End of search  -->

        <div class="table-responsive-sm">
            <table class="table table-bordered  table-hover table-sm text-center ">
                <thead>
                <tr class="bg-dark text-white" >
                    <th scope="col"><i class="fa fa-list"></i></th>
                    <th scope="col"><i class="fa fa-sitemap"></i></th>
                    <th scope="col"><i class="fa fa-cogs"></i> {{__('Status')}}</th>
                    <th scope="col"><i class="fa fa-clock"></i> {{__('t.date')}}</th>
                    <th scope="col"><i class="fa fa-cogs"></i></th>
                </tr>
                </thead>
                <tbody>
                <?php $i =1; ?>
                @forelse($company_service as $val)
                    <tr>
                        <th class="bg-dark text-white" scope="row">{{$i++}}</th>
                        <td>{{$val->categories->name}}</td>
                        <td>
                            @livewire('switcher', ['model' => $val, 'field' => 'status'], key($val->id))
                        </td>
                        <td>{{\Carbon\Carbon::parse($val->created_at)->getTranslatedDayName()}}
                            {{\Carbon\Carbon::parse($val->created_at)->format('Y-m-d')}}
                        </td>
                        <td>
                            <button class="btn  btn-sm " wire:click="edit({{ $val->id }})"><i class="fas fa-edit text-primary"></i></button> &nbsp;
                            <button class="btn btn-sm " onclick="delete_ct({{ $val->id }})"><i class="fas fa-trash text-danger"></i></button>
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
    {{--End Table--}}


</div>


<script>


    function delete_ct($id){
        // if(confirm("Are you sure to delete this item ?")){
        //     window.livewire.emit('delete_cat',$id);
        // }

        Swal.fire({
            title: '{{__('Are you sure?')}}',
            // text: "Are you sure to delete this item ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '{{__('Yes, delete it!')}}',
            cancelButtonText: '{{__('Cancel')}}'
        }).then((result) => {
            if (result.isConfirmed) {
                window.livewire.emit('delete_ct',$id);
            }
        })
    }


</script>
