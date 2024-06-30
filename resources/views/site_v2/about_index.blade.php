@extends('layouts.guest_new',['title'=> __('t.about')])
@section('content')
    @include('site_v2.about_body')
@endsection
@section('page_title')
    @include('site_tools_v2.page_title',['main_title'=>__('About')])
@endsection
