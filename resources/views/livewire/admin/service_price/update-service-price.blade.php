<div>
    <div class="row shadow card-body p-3 m-3">
        <div class="col-lg-12 col-md-12">
            <form wire:submit.prevent="update()">
                <div class="row text-center">
                    <div class="col-lg-3 col-md-6">

                        <input type="text" name="" wire:model.defer="service_id" hidden/>
                        <label>{{__('Categories')}}</label>
                        <select wire:model.defer="category_id" name="" id="" class="form-control @error('name') is-invalid @enderror">
                            <option selected  >{{__('t.select')}}</option>

                            @forelse($categories as $key=>$cat)
                                <option value="" disabled class="bg-dark text-white text-center">{{$cat->name}}</option>
                                @foreach($cat->child as $child)
                                    <option value="{{$child->id}}">{{$child->name}}</option>
                                @endforeach
                            @empty
                                <a href="{{route('admin.categories')}}" class="btn btn-outline-primary">{{__('t.add')}}</a>
                            @endforelse
                        </select>
                        <span>@error('name') {{ $message }} @enderror</span>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <label for="">{{__('Service type')}}</label>
                        <select class="form-control" wire:model.defer="type" wire:change="type_change">
                            <option selected  >{{__('t.select')}}</option>
                            <option value="0">{{__('Static')}}</option>
                            <option value="1">{{__('On Request')}}</option>
                        </select>
                    </div>

                    <div class="col-lg-3">
                        <label for="">{{__('t.price')}}</label>
                        <input type="number" name="" id="" class="form-control @error('price') is-invalid @enderror" wire:model="price"  min="0"/>
                        <span>@error('price') {{ $message }} @enderror</span>
                    </div>

                    <div class="col-lg-3">
                        <label for="">{{__('Site Present')}}</label>
                        <input type="number" name="" id="" class="form-control @error('present') is-invalid @enderror" wire:model="present"  min="0"/>
                        <span>@error('present') {{ $message }} @enderror</span>
                    </div>
                </div>

                @if($service)
                    <div class="row text-center">
                        <div class="col-lg-2">
                            <label for="">{{__('Service Price')}}</label>
                            <input type="number" name="" id="" class="form-control @error('service_price') is-invalid @enderror" wire:model="service_price"  min="0"/>
                            <span>@error('service_price') {{ $message }} @enderror</span>
                        </div>

                        @if($service_price > 0)
                            <div class="col-lg-2">
                                <label for="">{{__('Discount')}}</label>
                                <input type="number" name="" id="" class="form-control @error('service_discount') is-invalid @enderror" wire:model="service_discount"  min="0"/>
                                <span>@error('service_discount') {{ $message }} @enderror</span>

                                <button class="btn btn-sm btn-primary" wire:click.prevent="discount">{{__('Done Discount')}}</button>


                            </div>

                            <div class="col-lg-2">
                                <label for="">{{__('After Discount')}}</label>
                                <input type="number" name="" id="" class="form-control @error('after_discount') is-invalid @enderror" wire:model="after_discount" disabled  min="0"/>
                                <span>@error('after_discount') {{ $message }} @enderror</span>


                            </div>
                        @endif


                    </div>
                @endif

                    <br>
                    <button class="btn btn-primary btn-sm"> <i class="fa fa-save"></i> {{__('t.save')}}</button>
                    <button class="btn btn-warning btn-sm" wire:click.prevent="cancel"> <i class="fa fa-times"></i> {{__('Cancel')}}</button>
            </form>
        </div>
    </div>
</div>
