@if(session()->has('message'))

    <script>
        Toast.fire({
            icon: 'success',
            title:'{{ session('message') }}',
        })
    </script>
@endif

@if(session()->has('error'))
    <script>
        Toast.fire({
            icon: 'error',
            title:'{{ session('error') }}',
        })
    </script>
@endif
