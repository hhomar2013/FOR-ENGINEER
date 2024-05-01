<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-center bg-dark text-white">{{__('Accounting')}} - {{__('Companies')}}</div>
                    <div class="card-body">
                        @include('message')
                        <div class="row shadow p-3 mb-3 bg-body rounded">

                            <div class="col-md-6 ">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-dark text-white"><i class="fa fa-search"></i></span>
                                    {{--                                    <input type="text" name="" id="search" class="form-control" wire:model="search"/>--}}
                                    <select class="form-control" wire:model="companyName" wire:change.prevent="companyChange">
                                        <option class="bg-secondary text-white-50 " disabled="disabled" selected="selected" value="0">{{__('t.select')}}</option>
                                        @foreach($companies as $val_)
                                            <option value="{{$val_['id']}}">{{$val_['name']}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div><!--End of search  -->
                        </div>
                        <hr>
                       <div class="card border-bottom-primary p-2">
                           @if($compInfo)
                               <h6 class="text-danger text-center">{{$compInfo->companies->name}}</h6>
                           @endif
                               <div class="row">
                                   @foreach($info as $info_val)
                                       <div class="card border-left-success p-3 col-md-4">
                                           {{$info_val->orders->order_ref}}
                                       </div>
                                   @endforeach
                               </div>

                       </div>
                    </div>



{{--                    <span class="p-3">{{$categories->links()}}</span>--}}
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
