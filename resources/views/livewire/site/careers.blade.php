<div>
    <!-- Contact Start -->
    <div class="contact wow fadeInUp">
        <div class="container">
            <div class="row" style="background: #030f27;padding: 50px;">
                <div class="col-12">
                    @if(session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show {{app()->getLocale() == 'ar' ? 'text-right' : ''}}" role="alert">
                            <strong>For Engineer ✔️ </strong> {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @elseif(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>For Engineer ✔️ </strong> {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>{{--End Of Message--}}

                <div class="col-lg-6">
                    <img src="{{ asset('asset/img/for.gif') }}" style="width: 100%;height: 100%" alt="">
                </div>
                <div class="col-lg-6">
                    <form>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="control-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="{{__('t.name')}}" required="required"  wire:model.defer="name"/>
                                    <p class="help-block text-danger">
                                        @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="control-group">
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"  placeholder="{{__('t.phone')}}" required="required" wire:model.defer="phone"/>
                                    <p class="help-block text-danger">
                                        @error('phone') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="control-group">
                                    <select class="form-control @error('type') is-invalid @enderror" wire:model="type">
                                        <option  selected="selected">{{__('job type')}}</option>
                                        @foreach($careers_type as $val)
                                            <option value="{{$val->id}}">{{$val->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('type') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-12 {{app()->getLocale() == 'ar' ? 'text-right' : ''}}">
                                <label for="formFileSm" class="form-label">{{ trans('CV') }}</label>
                                <input class="form-control form-control-file  @error('attach') is-invalid @enderror" id="formFileSm" type="file" accept="application/pdf"  wire:model="attach"/>
                                <span class="error text-secondary">{{ __('t.file_size') }}</span>
                                @error('attach') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            @include('load',['name'=> 'attach'])
                        </div>

                        <div class="{{app()->getLocale() == 'ar' ? 'text-right' : '' }}"><br>
{{--                            <div wire:loading.inline wire:target="save" class="text-center">--}}
{{--                                <div class="spinner-border text-secondary" role="status">--}}
{{--                                    <span class="visually-hidden"></span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <button class="btn btn-outline-warning p-2 w-25" type="submit" wire:click.prevent="save"><i class="fas fa-paper-plane"></i> {{__('t.Submit')}}</button>
                            @include('load',['name'=> 'save'])
                        </div>
                    </form>
                </div>{{--End Of content div--}}

            </div>
        </div>
    </div>
    <!-- Contact End -->
</div>
