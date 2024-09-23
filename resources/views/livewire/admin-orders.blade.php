<div>
    <a class="nav-link" href="{{route('admin.Orders')}}">
        <i class="fas fa-clock"></i>
        <span> {{__('Orders')}}</span>
        {{-- <span class="badge text-white" wire:poll.keep-alive>{{ $order_count }}</span> --}}
        <span class="badge text-white">{{ $order_count }}</span>
{{--        <span class="badge badge-danger badge-counter">3+</span>--}}
    </a>
</div>



