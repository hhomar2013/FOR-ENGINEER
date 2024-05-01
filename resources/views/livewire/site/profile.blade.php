<div>
    @if(session()->has('message'))

    <script>
            Toast.fire({
            icon: 'success',
            title:'{{ session('message') }}',
            })
    </script>
    @endif
        <div class="container mt-4">
            <div class="card ">
                <div class="card-header bg-warning text-center text-dark">{{__('t.profile')}}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <form wire:submit.prevent="save">
                                <div class="card {{app()->getLocale() == 'ar' ? 'text-right' : ''}}">
                                    <div class="card-body p-4">
                                        <label>{{__('t.name')}}</label>
                                        <input wire:model="name" type="text" class="form-control @error('name') is-invalid @enderror" />
                                        @error('name') <span class="error">{{ $message }}</span> @enderror
{{--                                        <label>{{__('t.email')}} </label>--}}
{{--                                        <input type="text" class="form-control" name="" id="" value="{{auth()->user()->email}}">--}}
                                    </div>
                                    <div class="card-footer bg-transparent">
                                        <button  type="submit" class="btn btn-primary  {{ (LaravelLocalization::getCurrentLocale() == 'ar' ?'float-right' : '') }}" >
                                            {{ trans('t.save') }} <i class="far fa-paper-plane"></i>
                                        </button>
                                    </div>

                                </div><!--End of Card -->
                            </form>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <form wire:submit.prevent="reset_password">
                                <div class="card {{app()->getLocale() == 'ar' ? 'text-right' : ''}}">
                                    <div class="card-body p-4">
{{--                                        <label>{{__('t.old_password')}}</label>--}}
{{--                                        <input type="password" class="form-control" wire:model.defer="oldPassword"/>--}}
                                        <label>{{__('t.password')}} </label>
                                        <input type="password" class="form-control" wire:model.defer="password">
                                        @error('password') <span class="error">{{ $message }}</span> @enderror
                                        <label>{{__('t.re-password')}} </label>
                                        <input type="password" class="form-control" wire:model.defer="confirmPassword">
                                        @error('confirmPassword') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="card-footer bg-transparent">
                                        <button  type="submit" class="btn btn-primary  {{ (LaravelLocalization::getCurrentLocale() == 'ar' ?'float-right' : '') }}" >
                                            {{ trans('t.save') }} <i class="far fa-paper-plane"></i>
                                        </button>
                                    </div>
                                </div><!--End of Card -->
                            </form>

                        </div>
                    </div><!--End of row -->
                </div>
            </div>

        </div>
</div>
