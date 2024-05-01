<x-mail::layout>
{{-- Header --}}
<x-slot:header>
<x-mail::header :url="config('app.url')">
{{--    <img src="{{asset('asset/img/for.gif')}}" class="logo" alt="Laravel Logo">--}}
    {{ config('app.name') }}
</x-mail::header>
</x-slot:header>

{{-- Body --}}
<div class="text-center">
    {{ $slot }}
</div>

{{-- Subcopy --}}
@isset($subcopy)
<x-slot:subcopy>
<x-mail::subcopy>
{{ $subcopy }}
</x-mail::subcopy>
</x-slot:subcopy>
@endisset

{{-- Footer --}}
<x-slot:footer>
<x-mail::footer>
© {{ date('Y') }} {{ config('app.name') }}. {{__('Copyrights To')}}
</x-mail::footer>
</x-slot:footer>
</x-mail::layout>
