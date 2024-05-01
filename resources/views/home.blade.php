@extends('layouts.site',['title' => __('t.home')])

@section('content')
{{--    carousel--}}
@livewire('site-service')
    @include('message')
@endsection

