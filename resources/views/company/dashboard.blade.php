@extends('layouts.company',['title' => auth()->user()->name])
@section('content')
@livewire('companies-statistics')
@endsection
