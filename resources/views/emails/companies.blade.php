<x-mail::message>
# {{__('Approved Successfully')}}
{{--{{__('The System are Create your email & password automatically and you can change your password in your profile together , make success.')--}}
{{--}}--}}

   #{{__('t.email') .': ' . $spa->email}}
   #{{__('t.password') .': '.$spa->password}}

<x-mail::button :url="'https://for-engineer.net/ar/company'">
    {{ __('t.companies') }}
</x-mail::button>
{{__('Thanks,')}}
<br>
{{ config('app.name') }}
</x-mail::message>
