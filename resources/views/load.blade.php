@isset($name)
    <div wire:loading.inline wire:target="{{$name}}">
        <div class="spinner-border text-warning" role="status">
        </div>
    </div>
@else
    <div wire:loading.inline>
        <div class="spinner-border text-warning" role="status">
        </div>
    </div>
@endisset

