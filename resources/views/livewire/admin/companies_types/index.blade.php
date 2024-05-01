<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-center bg-dark text-white">{{__('Company Types')}}</div>
                    <div class="card-body">
                        @include('message')
                        {{--Seach--}}
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

                        </div>
                        {{--End Seach--}}
                        {{-- OffCanvas --}}
                        <div class="offcanvas offcanvas-start bg-dark text-white" tabindex="-1" id="offcanvasWithBackdrop" aria-labelledby="offcanvasWithBackdropLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasWithBackdropLabel"><i class="fa fa-filter"></i> {{ __('t.filter') }}</h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <p>{{ __('t.date') }}</p>

                                <form wire:submit.prevent="filter_date">
                                    <div class="input-group">
                                        <input type="date" class="form-control"  wire:model.defer="date_from"/>
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-filter"></i></button>
                                        </div>

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

                        @if($update)
                            @include('livewire.admin.companies_types.update-companies-types')
                        @else
                            @include('livewire.admin.companies_types.create-companies-types')
                        @endif

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
                                @forelse($companiesTypes as $val)
                                    <tr>
                                        <th class="bg-dark text-white" scope="row">{{$i++}}</th>
                                        <td>{{$val->name}}</td>
                                        <td>
                                            @livewire('switcher', ['model' => $val, 'field' => 'status'], key($val->id))
                                         </td>
                                        <td>{{\Carbon\Carbon::parse($val->created_at)->getTranslatedDayName()}}
                                            {{\Carbon\Carbon::parse($val->created_at)->format('Y-m-d')}}
                                        </td>
                                        <td>
                                        @include('livewire.component.actions')
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
                    <span class="p-3">{{$companiesTypes->links()}}</span>
                </div>
            </div>
        </div>
    </div>
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
