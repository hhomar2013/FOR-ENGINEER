<div>
    @foreach($categories->children as $child)

                        <div class="form-check p-1 mr-3 lis">
                            <input class="" type="checkbox" value="{{$child->id}}" id="{{$child->id}}-flexCheckDefault"  wire:model="filter_check">
                            <label class="form-check-label" for="{{$child->id}}-flexCheckDefault">
                                {{$child->name}}
                            </label>
                        </div>
        @if($child->children->count())
{{--            <livewire:site-service-list-child :categories="$child">--}}
        <ol>
            @include('livewire.site.site-service-list-child',['categories' => $child])
        </ol>

        @endif
    @endforeach
</div>
