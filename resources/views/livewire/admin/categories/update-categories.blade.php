<div>
    <div class="row shadow card-body p-3 m-3">
        <div class="col-12 col-md-6">
            <form >
                <div class="">
                    <label>{{__('t.name')}}</label>
                    <input type="hidden" name="" wire:model="update_id">
                    <input type="text" name="" id="" class="form-control @error('name') is-invalid @enderror" placeholder="@error('name') {{ $message }} @enderror" wire:model="name" />
                    <br>

                    <lable>{{__('القسم')}}</lable>
                    <select class="form-control @error('category_id') is-invalid @enderror" wire:model.defer="category_id">
                        <option value="" class="text-danger text-white"  selected>{{__('t.select')}}</option>
                        <option>{{__('Main Category')}}</option>
                        @foreach($categories as $val)
                            <option value="{{$val->id}}">{{$val->name}}</option>
                        @endforeach
                    </select>
                    <br>
                    <button class="btn btn-warning" wire:click.prevent="update()" >{{__('t.save')}}</button>
                    <a href={{ route('admin.categories') }} class="btn btn-secondary">{{__('Cancel')}}</a>
                </div>


            </form>
        </div>
    </div>

</div>
