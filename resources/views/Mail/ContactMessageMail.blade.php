<x-mail::message>

    @if($contactMessage->status == 0)
        {{__('Your Order Under review')}}
    @elseif($contactMessage->status == 1)
        {{__('Done answered your request please check your inbox')}}
    @endif

{{--<x-mail::button :url="''">--}}
{{--Button Text--}}
{{--</x-mail::button>--}}
{{__('Thanks,')}}<br>
{{ config('app.name') }}
</x-mail::message>
