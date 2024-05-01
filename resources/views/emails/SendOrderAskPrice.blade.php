<x-mail::message>
{{__('Done answered your request')}} - #{{$orderInvoice->order_ref}}

    عرض السعر المطلوب هو : {{ $orderInvoice->ask_price }} {{ __('SAR') }}



{{--<x-mail::button :url="env('app_url')">--}}
{{--    {{__('Go to website')}}--}}
{{--</x-mail::button>--}}

{{__('Thanks,')}}<br>
{{ config('app.name') }}
</x-mail::message>
