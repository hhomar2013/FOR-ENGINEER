<div>
    <div class="row">
        <div class="col-12 p-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form wire:submit.prevent="save">
                        <div class="col-lg-6 col-md-12">
                            @php
                                // dd($categories);
                            @endphp
                            <label for="">{{__('Service type')}}</label>
                            <select  class="form-select @error('name') is-invalid @enderror" wire:model="service">
                                <option selected>{{__('t.select')}}</option>
                                @foreach($categories as $val)

                                   @if($val->child->count() > 0)
                                       <option class="bg-dark text-white" value="{{$val->id}}" disabled>{{$val->name}}</option>
                                       @foreach($val->child as $val_child)
                                           <option value="{{$val_child->id}}" class="text-center"> {{$val_child->name}}</option>
                                       @endforeach
                                   @else
                                       {{-- <option value="{{$val->id}}">{{$val->name}}</option> --}}
                                   @endif

                                        {{-- <option value="{{$val->id}}">{{$val->name}}</option> --}}
                                @endforeach
                            </select>
                            <span>@error('name') {{ $message }} @enderror</span>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">{{__('t.save')}}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
