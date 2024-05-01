@extends('layouts.company',['title' => __('Your Services')])
@section('content')
    @livewire('company-service-component')
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                theme: "bootstrap-5",
                placeholder:'{{__('t.select')}}'
            });
        });
    </script>
@endsection
