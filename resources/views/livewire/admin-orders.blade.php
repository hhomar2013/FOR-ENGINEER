<div>

    <div wire:poll>
        <a class="nav-link" href="{{route('admin.Orders')}}">
            <i class="fas fa-clock"></i>
            <span> {{__('Orders')}}</span>
            <span class="badge text-white" wire:poll.keep-alive>{{ $orderCount }}</span>
        </a>
    </div>

</div>



{{-- @push('js')
    <script>
        window.addEventListener('order_count', (event) => {
            new Audio("{{url('storage/sound/notification.mp3')}}").play();
        })
    </script>

    <script>
        window.addEventListener('order_count_message' , (event)=> {
            Toast.fire({icon: 'success',title:'{{ __("You Have New Order") }}'});
        })
    </script>
@endpush --}}
