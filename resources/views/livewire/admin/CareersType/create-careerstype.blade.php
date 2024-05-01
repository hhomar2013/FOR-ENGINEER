<div>
    <div class="row shadow card-body p-3 m-3">
        <div class="col-lg-6 col-md-12">
            <form wire:submit.prevent="save">

                    <label>{{__('t.name')}}</label>
                    <input type="text" name="" id="" class="form-control @error('name') is-invalid @enderror" placeholder="@error('name') {{ $message }} @enderror" wire:model.defer="name" />
{{--                    @error('name') <span class="error text-danger text-sm-center">{{ $message }}</span> @enderror--}}
                    <br>
                    <button class="btn btn-primary btn-sm" type="submit"> <i class="fa fa-save"></i> {{__('t.save')}}</button>
            </form>
        </div>
    </div>
</div>
