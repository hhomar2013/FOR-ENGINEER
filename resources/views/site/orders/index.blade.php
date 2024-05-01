@extends('layouts.site',['title'=>__('Orders')])
@section('content')

  @livewire('order-component')
@push('js')
    @include('message')

    <script>
        ClassicEditor
            .create( document.querySelector( '.editor' ),{
                toolbar: [ 'heading', '|', 'bold', 'italic', '|', 'bulletedList', 'numberedList', 'blockQuote'],
            })
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    let details = $('.editor').data('details');
                    eval(details).set('details', editor.getData())
                })
            });
    </script>
{{--End Of Editor--}}
@endpush

@endsection
