<div>
{{--    Heding Page--}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{__('t.profile')}}</h1>
    </div>
{{--End of Heading Page--}}

{{--    Content--}}
<!-- Content Row -->
    @include('message')
    <div class="row">
        <div class="card p-3 shadow-sm">
            <div class="card-body">

                    <div class="row">
                        <div class="col-lg-6">
                            <form wire:submit.prevent="save_profile">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">{{__('Company Name')}}</label>
                                            <input type="text" class="form-control"  placeholder="{{__('Company Name')}}" wire:model.defer="name">
                                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label  class="form-label">{{__('t.phone')}}</label>
                                            <input type="text" class="form-control"  placeholder="{{__('t.phone')}}" wire:model.defer="phone">
                                            @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label  class="form-label">{{__('t.type_work')}}</label>
                                            <select class="form-control" wire:model.defer="type_work">
                                                @foreach($ct as $val)
                                                    @if($val->id == $type_work)
                                                        <option selected="selected" class="bg-dark text-white" value="{{$val->id}}">{{ $val->name }}</option>
                                                    @else
                                                        <option value="{{$val->id}}">{{ $val->name }}</option>
                                                    @endif

                                                @endforeach

                                            </select>
{{--                                            <input type="text" class="form-control"  placeholder="{{__('t.type_work')}}" wire:model.defer="type_work">--}}
                                            @error('type_work') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label  class="form-label">{{__('t.about')}}</label>
                                            <textarea type="text" class="form-control"  placeholder="{{__('t.about')}}" wire:model.defer="about"></textarea>
                                            @error('about') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label  class="form-label">{{__('t.password')}}</label>
                                                    <input type="password" class="form-control"  placeholder="{{__('t.password')}}" wire:model.defer="password">
                                                    @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                                                </div>
                                                <div class="col-lg-6">
                                                    <label  class="form-label">{{__('t.re-password')}}</label>
                                                    <input type="password" class="form-control"  placeholder="{{__('t.re-password')}}" wire:model.defer="rePassword">
                                                    @error('rePassword') <small class="text-danger">{{ $message }}</small> @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-12">
                                    <button class="btn btn-primary">{{__('t.save')}} <i class="fa fa-save"></i></button>
                                </div>
                            </form>
                            <hr>
                        </div>


                        <div class="col-lg-6">
                            <form wire:submit.prevent="update_image">
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <label for="formFile" class="form-label"><i class="fa fa-image"></i></label>
                                            <input class="form-control" type="file" id="formFile" wire:model.defer="photo">
                                            @error('photo') <small class="text-danger">{{ $message }}</small> @enderror
                                            <div wire:loading wire:target="photo" class="p-2">
                                                <div class="spinner-border text-primary" role="status">
                                                    <span class="visually-hidden"></span>
                                                </div>
                                                {{__('Uploading...')}}
                                            </div>
                                        </div>

                                        <div class="col-lg-2 text-center border-danger">
                                            @if ($photo)
                                                <img src="{{ $photo->temporaryUrl() }}" class="rounded-circle" style="width: 100px;height: 100px;">
                                            @elseif($fileName)
                                                <img src="{{ asset('storage/'.$fileName) }}" class="rounded-circle" style="width: 100px;height: 100px;">
                                            @else
                                                <img src="{{ asset('asset/img/for4.png') }}" class="rounded-circle" style="width: 100px;height: 100px;">
                                            @endif
                                        </div>


                                        <div class="col-lg-12">
                                            <button class="btn btn-primary">{{__('t.save')}} <i class="fa fa-save"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>


                    </div>

            </div>
        </div>
    </div>
</div>
