<div>
    @include('message')
    @if($order_show)
        @include('site.user_orders.user_order_show')
    @else
        @if($order_invoice)
            @include('site.user_orders.user_order_invoice')
        @else
            @include('site.user_orders.user_order_table')
        @endif
    @endif

</div>
<script>
    function destroy($id){
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
                window.livewire.emit('destroy',$id);
            }
        })
    }


</script>
