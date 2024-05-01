@extends('layouts.guest',['title'=> trans('t.home')])
@section('content')
    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>{{__('Careers')}}</h2>
                </div>

            </div>
        </div>
    </div>
    <!-- Page Header End -->
    @livewire('careers')

@endsection



