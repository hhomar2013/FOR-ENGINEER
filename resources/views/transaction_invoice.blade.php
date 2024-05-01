@extends('layouts.site_pay',['title' => __('t.home')])

@section('content')
    <div class="col-12 text-center p-4">
        <img src="{{asset('asset/img/for.gif')}}" class="rounded-circle" style="height: 120px;width: 120px" alt="">

        <br><br>
        <div class="mysr-form"></div>
        <a href="{{ route('site.user_orders') }}" class="btn btn-danger p-3"><i class="fa fa-arrow-left"></i> {{__('Back')}} </a>
    </div>
@endsection

@section('js')
    @include('message')
    <script>
        Moyasar.init({
            element: '.mysr-form',
            // Required
            // Amount in the smallest currency unit.
            // For example:
            // 10 SAR = 10 * 100 Halalas
            // 10 KWD = 10 * 1000 Fils
            // 10 JPY = 10 JPY (Japanese Yen does not have fractions)
            amount: '{{$data['amount']}}',
            currency: 'SAR',
            description: '{{ session('service') == '' ? 'Payment' : session('service') }}',
            publishable_api_key: '{{config('moyasar.publishable_key')}}',
            callback_url: '{{route('call_back_invoice')}}',
            methods: ['creditcard'],
            language: '{{app()->getLocale()}}',
            credit_card: {
                save_card: true,
            }
        });
        // 'stcpay' ,
    </script>
@endsection

