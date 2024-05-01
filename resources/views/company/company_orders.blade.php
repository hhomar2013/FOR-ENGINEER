@extends('layouts.company',['title' => auth()->user()->name])
{{--<script src="{{ asset('asset/js/tinymce.min.js') }}" referrerpolicy="origin"></script>--}}
@section('content')
@livewire('companies-orders-components')
@endsection

@section('js')
    <script  src="{{asset('asset/js/ckeditor5.js')}}"></script>
@endsection
