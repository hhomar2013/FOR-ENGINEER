<x-mail::message>{{__('Approved Successfully')}}

<x-mail::panel>
    {{__('t.email') .' : ' . $spa->email}}
</x-mail::panel>

<x-mail::panel>
    {{__('t.password') .' :  '.$spa->password}}
</x-mail::panel>
<x-mail::button :url="$url">
    {{ __('t.companies') }}
</x-mail::button>
{{__('Thanks,')}}
<br>
{{ config('app.name') }}
</x-mail::message>
