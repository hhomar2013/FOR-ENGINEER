<div>
    <div class="row">
        <div class="col-12 p-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form wire:submit.prevent="update">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" name="" id="" wire:model.defer="service_id" hidden>
                                <input type="text" name="" id="" wire:model.defer="odl_id" hidden>
                                <label for="">{{__('Service type')}}</label>
                                <select  class="form-control"  wire:model.defer="service">
                                    <option>{{__('t.select')}}</option>
                                    @foreach($categories as $val)
{{--                                        @if($val->child->count() > 0)--}}
{{--                                            <option class="bg-dark text-white" value="{{$val->id}}" disabled>{{$val->name}}</option>--}}
{{--                                            @foreach($val->child as $val_child)--}}
{{--                                                <option value="{{$val_child->id}}" class="text-center">{{$val_child->name}}</option>--}}
{{--                                            @endforeach--}}
{{--                                        @else--}}
{{--                                            <option value="{{$val->id}}">{{$val->name}}</option>--}}
{{--                                        @endif--}}

                                        <option value="{{$val->id}}">{{$val->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <br>
                        <button  class="btn btn-primary">{{__('t.save')}}</button>
                        <button  class="btn btn-warning" wire:click.prevent="cancel">{{__('Cancel')}}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
