<div>

    <div wire:poll="getData">
        <a class="nav-link" href="{{route('admin.Orders')}}">
            <i class="fas fa-clock"></i>
            <span> {{__('Orders')}}</span>
            <span class="badge text-white" wire:poll.keep-alive>{{ $orderCount }}</span>
        </a>
    </div>

</div>



@push('js')
<script>
    <script>
       window.addEventListener('getData', (event) => {
           new Audio("{{url('storage/sound/notification.mp3')}}").play();
       })
   </script>
</script>
@endpush
