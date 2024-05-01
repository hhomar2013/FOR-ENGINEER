@extends('layouts.site',['title' => __('t.home')])

@section('content')
    @livewire('notification-list')
@endsection

@section('js')
{{--    @include('message')--}}
@endsection

