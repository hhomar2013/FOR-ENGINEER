<x-mail::message>
# {{__('Career Request')}}

    @if($CareerRequest->status == 0)
        {{__('Your Order Under review')}}
    @elseif($CareerRequest->status == 1)
        {{__('Done answered your request please check your inbox')}}
    @endif



{{__('Thanks,')}}<br>
{{ config('app.name') }}
</x-mail::message>
