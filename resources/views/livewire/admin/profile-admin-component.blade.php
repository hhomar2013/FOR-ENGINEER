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
                        <form wire:submit.prevent="save">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">{{__('t.name')}}</label>
                                        <input type="text" class="form-control" placeholder="{{__('t.name')}}"
                                               wire:model.defer="name">
                                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label class="form-label">{{__('t.password')}}</label>
                                                <input type="password" class="form-control"
                                                       placeholder="{{__('t.password')}}" wire:model.defer="password">
                                                @error('password') <small
                                                    class="text-danger">{{ $message }}</small> @enderror
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="form-label">{{__('t.re-password')}}</label>
                                                <input type="password" class="form-control"
                                                       placeholder="{{__('t.re-password')}}"
                                                       wire:model.defer="rePassword">
                                                @error('rePassword') <small
                                                    class="text-danger">{{ $message }}</small> @enderror
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


                </div>

            </div>
        </div>
    </div>
</div>
