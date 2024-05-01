<div>
{{--    @if(session()->has('message'))--}}

{{--    <script>--}}
{{--            Toast.fire({--}}
{{--            icon: 'success',--}}
{{--            title:'{{ session('message') }}',--}}
{{--            })--}}
{{--    </script>--}}
{{--    @endif--}}
    @include('message')
    <div class="form-check form-switch">
        <input class="form-check-input " type="checkbox" id="toggle-{{ $model->id }}" wire:model="isPublished" name="toggle-{{ $model->id }}">
        <label class="form-check-label" id="toggle-{{ $model->id }}" for="toggle-{{ $model->id }}"></label>
    </div>
</div>
