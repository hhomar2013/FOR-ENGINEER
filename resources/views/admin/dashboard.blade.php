@extends('layouts.admin1',['title'=>__('t.dashboard')])
<?php //dd(session()->all()); ?>

@section('content')
    @livewire('dashboard')
@endsection

