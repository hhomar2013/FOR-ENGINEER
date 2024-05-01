@extends('layouts.site',['title'=>__('Orders')])
@section('content')
    @livewire('user-orders-component')
@endsection

@section('js')
    @include('message')
@endsection
