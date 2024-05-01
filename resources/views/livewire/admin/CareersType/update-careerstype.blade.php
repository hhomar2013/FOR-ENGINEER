<div>
    <div class="row shadow card-body p-3 m-3">
        <div class="col-12 col-md-6">
            <form >
                <div class="">
                    <label>{{__('t.name')}}</label>
                    <input type="hidden" name="" wire:model="update_id">
                    <input type="text" name="" id="" class="form-control @error('name') is-invalid @enderror" placeholder="@error('name') {{ $message }} @enderror" wire:model="name" />
                    <br>
                    <button class="btn btn-warning" wire:click.prevent="update()" >{{__('t.save')}}</button>
                    <button class="btn btn-secondary" wire:click.prevent="cancel" >{{__('Cancel')}}</button>
                </div>


            </form>
        </div>
    </div>

</div>
