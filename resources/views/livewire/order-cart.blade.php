<div>
{{--    @php--}}
{{--        $orders = \App\Models\Order::query()->where('status','0')->where('user',auth()->id())->get()--}}
{{--    @endphp--}}
    <a href="{{route('site.user_orders')}}" class="nav-item nav-link"> <span class="badge bg-danger text-white rounded-circle" >{{$orders->count() > 0 ? $orders->count() : '' }}</span> <i class="fa-brands fa-opencart"> </i>   {{ __('Your Orders') }}
        </a>
</div>
