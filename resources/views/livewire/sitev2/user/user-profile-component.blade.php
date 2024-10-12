<div>
@section('title'){{ __('Profile') }}@endsection
@section('page_title')@include('site_tools_v2.page_title',['main_title'=>__('Profile')])@endsection
    <!-- Starter Section Section -->
    <section id="starter-section" class="starter-section section">
        <div class="container" >
          <div class="row">
            <div class="col-lg-6">
                <div class="card border border-0 shadow">
                    <div class="card-body">
                        <form class="g-3" wire:submit.prevent="save">
                            <div class="row g-3 ">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">{{ __('Name') }}</label>
                                    <input wire:model="name" type="text" class="form-control" id="name">
                                </div>
                            </div>
                            <div class="row g-3 ">
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">{{ __('Password') }}</label>
                                    <input type="password" class="form-control" id="inputPassword4">
                                </div>
                            </div>
                            &nbsp;
                            <div class="col-12">
                            <button type="submit" class="btn btn-warning ">{{ __('t.Submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

                        <div class="col-lg-6 shadow p-3">
                            <form >
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
                                            <button wire:click.prevent="updateImage" class="btn btn-primary">{{__('t.save')}} <i class="fa fa-save"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
          </div>


        </div>

      </section><!-- /Starter Section Section -->
</div>
